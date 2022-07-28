<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Book;

use Stripe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    function reserve(Request $request)
    {
        if (!session()->get('logged')) {
            Session::flash('error', 'You need to login or create account before reserving room');
            return redirect()->route('auth.signin');
        }

        $invalid = $request['arrival_date'] < date('Y-m-d');

        if ($invalid) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->back();
        }


        $customer = Account::where('username', session()->get('username'))->first();
        $singleRoom = Room::where('room_type', 'single')->first();
        $familyRoom = Room::where('room_type', 'family')->first();
        $twinRoom = Room::where('room_type', 'twin')->first();

        if ($singleRoom && $singleRoom->available_rooms >= 1) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom && $familyRoom->available_rooms >= 1) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom && $twinRoom->available_rooms >= 1) session()->put('twin_room', $twinRoom['id']);


        if (!$customer) return;

        session()->put('arrival_date', $request['arrival_date']);
        session()->put('rooms', $request['rooms']);
        session()->put('adults', $request['adults']);
        session()->put('children', $request['children']);

        return view('customer.reserve')->with('reservation_key', Str::random(6))
            ->with('arrival_date', $request['arrival_date'])
            ->with('account_id', $customer->id)
            ->with('reservation_date', date('Y-m-d'));
    }

    function reserve_post(Request $request)
    {

        $room = Room::where('id', $request['room_id'])->first();

        if ($room->available_rooms <= 0) {
            Session::flash('error', 'The Room Type You Selected All Is Taken');
            return redirect()->route('home');
        } else if ($room->available_rooms < $request['rooms']) {
            Session::flash('error', 'We Have ' . $room->available_rooms . ' ' . $room->room_type . ' Type Rooms Available Lower It Little.');
            return redirect()->route('home');
        }

        if ($request['departure_date'] < $request['arrival_date']) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->route('home');
        }

        Reservation::create($request->except('_token'));

        session()->put('res_key', $request['reservation_id']);

        $day = new Carbon($request['departure_date']);

        $diffInDays = $day->diff($request['arrival_date'])->d;

        session()->put('total_price', ($request['rooms'] * $room->price * $diffInDays));

        return redirect()->route('customer.view.payment');
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

        if ($singleRoom && $singleRoom->available_rooms >= 1) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom && $familyRoom->available_rooms >= 1) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom && $twinRoom->available_rooms >= 1) session()->put('twin_room', $twinRoom['id']);


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
        $room = Room::find($request['room_id']);

        if (!$reservation || !$room) {
            Session::flash('error', 'Room Or Reservation Cannot Be Found, Maybe Deleted');
            return redirect()->back();
        }

        if ($room->available_rooms <= 0) {
            Session::flash('error', 'The Room Type You Selected Is All Taken');
            return redirect()->route('customer.reservations');
        } else if ($room->available_rooms < $request['rooms']) {
            Session::flash('error', 'We Have ' . $room->available_rooms . ' ' . $room->room_type . ' Type Rooms Available Lower It Little.');
            return redirect()->route('customer.update.reservations');
        }


        $reservation->update([
            'room_id' => $request['room_id'],
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
        $room = Room::find($reservation->room_id);

        if ($reservation->reserved)  $room->update(['available_rooms' => ($room->available_rooms + $reservation->rooms)]);

        $reservation->delete();

        Session::flash('success', 'Reservation cancelled (deleted) successfully');

        return redirect()->back();
    }

    function get_direct_reservation()
    {
        if (!Session::has('username')) {
            Session::flash('error', 'You need to login, or create account before reserving room');
            return redirect()->route('auth.signin');
        }

        $account = Account::where('username', session()->get('username'))->first();

        $singleRoom = Room::where('room_type', 'single')->first();
        $familyRoom = Room::where('room_type', 'family')->first();
        $twinRoom = Room::where('room_type', 'twin')->first();

        if ($singleRoom && $singleRoom->available_rooms >= 1) session()->put('single_room', $singleRoom['id']);
        if ($familyRoom && $familyRoom->available_rooms >= 1) session()->put('family_room', $familyRoom['id']);
        if ($twinRoom && $twinRoom->available_rooms >= 1) session()->put('twin_room', $twinRoom['id']);



        return view('customer.direct_reservation')->with('account_id', $account->id)->with('rkey', Str::random(6))
            ->with('reservation_date', date('Y-m-d'));
    }

    function store_direct_reservation(Request $request)
    {
        $room = Room::where('id', $request['room_id'])->first();

        if ($room->available_rooms <= 0) {
            Session::flash('error', 'The Room Type You Selected All Is Taken');
            return redirect()->route('customer.get.direct.reservation');
        } else if ($room->available_rooms < $request['rooms']) {
            Session::flash('error', 'We Have ' . $room->available_rooms . ' ' . $room->room_type . ' Type Rooms Available Lower It Little.');
            return redirect()->route('customer.get.direct.reservation');
        }

        if ($request['arrival_date'] < date('Y-m-d')) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->route('customer.get.direct.reservation');
        }


        if ($request['departure_date'] < $request['arrival_date']) {
            Session::flash('error', 'The Date You Entered Is Invalid');
            return redirect()->route('customer.get.direct.reservation');
        }

        Reservation::create($request->except('_token'));

        $day = new Carbon($request['departure_date']);
        $diffInDays = $day->diff($request['arrival_date'])->d;

        session()->put('total_price', ($request['rooms'] * $room->price * $diffInDays));
        session()->put('res_key', $request['reservation_id']);


        return redirect()->route('customer.view.payment');
    }

    function paymentForm()
    {
        return view('payment.pay');
    }

    function paymentFinished(Request $request)
    {
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $res = Stripe\Charge::create([
                'amount' =>  ceil(session()->get('total_price')),
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Hotel payment',
                'metadata' => ['res_key' => $request['res_key']]
            ]);



            $res_key = $res['metadata']['res_key'];

            $reservation = Reservation::where('reservation_id', $res_key)->first();

            Book::create([
                'customer_id' => $reservation->account_id,
                'book_date' => date('Y-m-d')
            ]);


            $reservation->reserved = true;
            $reservation->save();


            Session::flash('success', 'Room Reserved Successfully');

            return redirect()->route('customer.reservations');
        } catch (Exception $ex) {
            return $ex;

            Session::flash('error', 'Error');
            return redirect()->route('customer.view.payment');
        }
    }
}
