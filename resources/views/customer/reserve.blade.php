@extends('layouts.master')

@section('title', 'Ayu | Customer Reservation')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('customer.reserve.post') }}" method="POST">
                    @csrf

                    <input type="hidden" name="nights" value="{{ Session::get('nights') }}">
                    <input type="hidden" name="rooms" value="{{ Session::get('rooms') }}">
                    <input type="hidden" name="adults" value="{{ Session::get('adults') }}">
                    <input type="hidden" name="children" value="{{ Session::get('children') }}">
                    <input type="hidden" name="account_id" value="{{ $account_id }}">

                    @include('includes.text_input', [
                        'id' => 'arrival_date',
                        'label' => 'Arrival Date',
                        'type' => 'date',
                        'value' => $arrival_date,
                    ])

                    @include('includes.text_input', [
                        'id' => 'departure_date',
                        'label' => 'Departure Date',
                        'type' => 'date',
                    ])


                    <div class="form-group">
                        <label for="arrival_date">Room Preferences</label>
                        <select name="room_id" class="form-control">
                            @if (Session::has('single_room'))
                                <option value="{{ Session::get('single_room') }}">Single</option>
                            @endif
                            @if (Session::has('family_room'))
                                <option value="{{ Session::get('family_room') }}">Family</option>
                            @endif
                            @if (Session::has('twin_room'))
                                <option value="{{ Session::get('twin_room') }}}">Twin</option>
                            @endif
                        </select>
                    </div>

                    @include('includes.text_input', [
                        'id' => 'reservation_id',
                        'label' => 'Reservation ID',
                        'type' => 'text',
                        'value' => $reservation_key,
                    ])


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Reserve</button>
                    </div>

                    <div class="form-group">
                        <button type="reset" class="btn btn-primary">Clear</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
