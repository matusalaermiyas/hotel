@extends('layouts.master')

@section('title', 'Ayu Hotel | Update Reservation')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <form action="{{ route('reception.put.reservation', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('includes.text_input', [
                    'value' => $reservation->arrival_date,
                    'label' => 'Arrival Date',
                    'id' => 'arrival_date',
                    'type' => 'date',
                ])
                @include('includes.text_input', [
                    'id' => 'departure_date',
                    'value' => $reservation->departure_date,
                    'label' => 'departure_date',
                    'type' => 'date',
                ])

                <div class="form-group">
                    <label for="room_id">Room Preferences</label>
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

                <div class="form-group">
                    <label for="reserved">Status</label>
                    <select name="reserved" class="form-control">
                        <option value="0" @if (!$reservation->reserved) selected @endif>Don't book (Don't Reserve)
                        <option value="1" @if ($reservation->reserved) selected @endif>Book (Reserved) </option>
                        </option>
                    </select>
                </div>

                @include('includes.text_input', [
                    'id' => 'nights',
                    'label' => 'Nights',
                    'value' => $reservation->nights,
                    'type' => 'number',
                ])
                @include('includes.text_input', [
                    'id' => 'rooms',
                    'label' => 'Rooms',
                    'value' => $reservation->rooms,
                    'type' => 'number',
                ])
                @include('includes.text_input', [
                    'id' => 'adults',
                    'label' => 'Adults',
                    'value' => $reservation->adults,
                    'type' => 'number',
                ])
                @include('includes.text_input', [
                    'id' => 'children',
                    'label' => 'Children',
                    'value' => $reservation->children,
                    'type' => 'number',
                ])


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

        @include('includes.sidebar')
    </div>

@endsection
