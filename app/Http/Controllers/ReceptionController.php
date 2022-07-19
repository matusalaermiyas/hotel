<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Book;
use App\Models\Leave;

class ReceptionController extends Controller
{
    //  - Book Reservation
    // - Cancel Reservation
    // - Update Reservation
    // - Generate Report   

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

        $reservation->delete();

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

        return view('reception.update_reservation_form')->with('reservation', $reservation);
    }

    function updateReservationStore(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        $reservation->update([
            'room_id' => $request['room_id'],
            'nights' => $request['nights'],
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
        return view('reception.generate_report');
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
        $reservation->update(['reserved' => true]);

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

        Leave::create([
            'reason' => $request['reason'],
            'employee_id' => $account['employee_id'],
            'leave_date' => $request['leave_date'],
            'return_date' => $request['return_date']
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
