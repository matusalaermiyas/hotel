<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Book;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ReceptionController extends Controller
{
    function dashboard()
    {
        return view('reception.dashboard');
    }

    function reservations()
    {
        $reservations = Reservation::all();

        return view('reception.reservations')->with('reservations', $reservations);
    }

    function cancelReservation()
    {
        $reservations = Reservation::all();
        return view('reception.cancel_reservation')->with('reservations', $reservations);
    }

    function cancelAReservation($id)
    {
        $reservation = Reservation::find($id);
        $room = Room::find($reservation->room_id);

        if ($reservation->reserved)  $room->update(['available_rooms' => ($room->available_rooms + $reservation->rooms)]);

        $reservation->delete();

        Report::create([
            'role' => session()->get('role'),
            'description' => 'Canceled Reservation',
            'employee_id' => session()->get('employee_id')
        ]);

        Session::flash('success', 'Reservation Canceled (Deleted Successfully)');

        return redirect()->back();
    }

    function updateReservation()
    {
        $reservations = Reservation::all();
        return view('reception.update_reservation')->with('reservations', $reservations);
    }

    function updateAReservation($id)
    {
        $reservation = Reservation::find($id);

        $singleRoom = Room::where('room_type', 'single')->first();
        $familyRoom = Room::where('room_type', 'family')->first();
        $twinRoom = Room::where('room_type', 'twin')->first();

        if ($singleRoom) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom) session()->put('twin_room', $twinRoom['id']);


        return view('reception.update_reservation_form')->with('reservation', $reservation);
    }

    function updateReservationStore(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        Report::create([
            'role' => session()->get('role'),
            'description' => 'Update Reservation Reservation',
            'employee_id' => session()->get('employee_id')
        ]);

        $reservation->update([
            'room_id' => $request['room_id'],
            'rooms' => $request['rooms'],
            'adults' => $request['adults'],
            'children' => $request['children'],
            'arrival_date' => $request['arrival_date'],
            'departure_date' => $request['departure_date'],
            'reserved' => $request['reserved']
        ]);

        Session::flash('success', 'Reservation updated successfully');

        return redirect()->route('reception.reservations');
    }

    function generateReport()
    {
        $numberOfReservedRooms = Reservation::where('reserved', 1)->get();
        $rooms = Room::all();


        return view('reception.generate_report')
            ->with('number_of_reserved_rooms', count($numberOfReservedRooms))
            ->with('rooms', count($rooms));
    }

    function bookReservation()
    {
        $reservations = Reservation::all();
        return view('reception.book_reservation')->with('reservations', $reservations);
    }

    function bookAReservation($id)
    {
        $reception = Account::where('username', session()->get('username'))->first();

        $reservation = Reservation::find($id);
        $room = Room::find($reservation->room_id);

        if ($room->available_rooms <= 0) {
            Session::flash('error', 'The Room User Selected Is All Taken');
            return redirect()->back();
        } else if ($room->available_rooms < $reservation->rooms) {
            Session::flash('error', 'The number of rooms available are ' . $room->available_rooms . ' lower it');
            return redirect()->route('reception.reserve.book');
        }

        $room->update(['available_rooms' => ($room->available_rooms - $reservation->rooms)]);
        $reservation->update(['reserved' => true]);

        Report::create([
            'role' => session()->get('role'),
            'description' => 'Booked Reservation',
            'employee_id' => session()->get('employee_id')
        ]);

        Book::create([
            'customer_id' => $reservation->account_id,
            'reception_id' => $reception->id,
            'book_date' => date('Y-m-d')
        ]);


        Session::flash('success', 'Room Booked Successfully');

        return redirect()->back();
    }

    function askLeave()
    {
        return view('reception.ask_leave');
    }

    function storeAskLeave(Request $request)
    {
        $account = Account::where('username', session()->get('username'))->first();


        if ($request['leave_date'] <  date('Y-m-d')) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->route('reception.ask.leave');
        } else if ($request['return_date'] < $request['leave_date']) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->route('reception.ask.leave');
        }

        $employee = Employee::find($account['employee_id']);

        if ($employee && $request['reason'] == 'pregnancy') {
            if ($employee->gender == 'male') {
                Session::flash('error', 'Male Cannot Have Pregnancy Leaves');
                return redirect()->route('reception.ask.leave');
            }
        }


        Leave::create([
            'reason' => $request['reason'],
            'employee_id' => $account['employee_id'],
            'leave_date' => $request['leave_date'],
            'return_date' => $request['return_date'],
            'other_details' => $request['other_details']
        ]);

        Report::create([
            'role' => session()->get('role'),
            'description' => 'Requested For Leave',
            'employee_id' => session()->get('employee_id')
        ]);

        Session::flash('success', 'Leave requested successfully, click see leave result from the menu, until the manager responds');

        return redirect()->route('reception.dashboard');
    }

    function seeLeaveResult()
    {
        $account = Account::where('username', session()->get('username'))->first();

        $leaves = Leave::where('employee_id', $account['employee_id'])->get();

        return view('reception.leave_request_result')->with('leaves', $leaves);
    }
}
