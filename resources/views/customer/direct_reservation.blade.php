@extends('layouts.master')

@section('title', 'Ayu | Customer Reservation')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="{{ route('customer.store.direct.reservation') }}" method="POST">
                    @csrf

                    <input type="hidden" name="account_id" value="{{ $account_id }}">
                    <input type="hidden" name="reservation_date" value="{{ $reservation_date }}">


                    @include('includes.text_input', [
                        'id' => 'arrival_date',
                        'label' => 'Arrival Date',
                        'type' => 'date',
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
                                <option value="{{ Session::get('twin_room') }}">Twin</option>
                            @endif
                        </select>
                    </div>


                    @include('includes.text_input', [
                        'id' => 'rooms',
                        'label' => 'Rooms',
                        'type' => 'number',
                    ])

                    @include('includes.text_input', [
                        'id' => 'adults',
                        'label' => 'Adults',
                        'type' => 'number',
                    ])
                    @include('includes.text_input', [
                        'id' => 'children',
                        'label' => 'Children',
                        'type' => 'number',
                    ])

                    @include('includes.rkey', ['rkey' => $rkey])


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
