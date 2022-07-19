<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    function reserve(Request $request)
    {
        if (!session()->get('logged')) {
            Session::flash('error', 'You need to login or create account before reserving room');
            return redirect()->route('auth.signin');
        }

        $customer = Account::where('username', session()->get('username'))->first();
        $singleRoom = Room::where('room_type', 'single')->first();
        $familyRoom = Room::where('room_type', 'family')->first();
        $twinRoom = Room::where('room_type', 'twin')->first();

        if ($singleRoom) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom) session()->put('twin_room', $twinRoom['id']);


        if (!$customer) return;

        session()->put('arrival_date', $request['arrival_date']);
        session()->put('nights', $request['nights']);
        session()->put('rooms', $request['rooms']);
        session()->put('adults', $request['adults']);
        session()->put('children', $request['children']);
        session()->put('customer_id', $customer['customer_id']);



        return view('customer.reserve')->with('reservation_key', Str::random(6))
            ->with('arrival_date', $request['arrival_date'])
            ->with('customer_id', $customer['id']);
    }

    function reserve_post(Request $request)
    {
        Reservation::create($request->except('_token'));

        Session::flash('success', 'Room reserved successfully, make sure to show reservation id when you came.');

        return redirect()->route('customer.reservations');
    }

    function dashboard()
    {
        return view('customer.dashboard');
    }

    function reservations()
    {
        $customer = Account::where('username', session()->get('username'))->first();

        $reservations = Reservation::where('account_id', $customer->id)->get();


        return view('customer.reservations')->with('reservations', $reservations);
    }

    function updateReservations()
    {
        $customer = Account::where('username', session()->get('username'))->first();
        $reservations = Reservation::where('account_id', $customer->id)->get();

        $singleRoom = Room::where('room_type', 'single')->first();
        $familyRoom = Room::where('room_type', 'family')->first();
        $twinRoom = Room::where('room_type', 'twin')->first();

        if ($singleRoom) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom) session()->put('twin_room', $twinRoom['id']);


        return view('customer.update_reservations')->with('reservations', $reservations);
    }

    function updateReservation($id)
    {
        $reservation = Reservation::find($id);

        return view('customer.update_reservation_form')->with('reservation', $reservation);
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
            'departure_date' => $request['departure_date']
        ]);

        Session::flash('success', 'Room reservation updated successfully');

        return redirect()->route('customer.reservations');
    }

    function cancelReservations()
    {
        $customer = Account::where('username', session()->get('username'))->first();

        $reservations = Reservation::where('account_id', $customer->id)->get();


        return view('customer.cancel_reservations')->with('reservations', $reservations);
    }

    function cancelReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        Session::flash('success', 'Reservation cancelled (deleted) successfully');

        return redirect()->back();
    }
}
