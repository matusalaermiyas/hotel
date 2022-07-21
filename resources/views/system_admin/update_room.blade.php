@extends('layouts.master')

@section('title', 'Ayu Hotel | Update Rooms')

@section('content')

    <div class="row">
        <section class="col-sm-10">
            <h1 style="font-size: 15px">Update Rooms</h1>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>Room No</th>
                    <th>Room Type</th>
                    <th>Room Picture</th>
                    <th>Available Rooms</th>
                    <th>Price</th>
                    <th>Floor No</th>
                    <th>Maximum Guests Allowed</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Discount</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->room_type }}</td>
                            <td> <img src="{{ $room->room_picture }}" alt="Room Picture"
                                    style="width: 100%; height: 50px; object-fit: contain"></td>
                            <td>{{ $room->available_rooms }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->floor_no }}</td>
                            <td>{{ $room->max_guest }}</td>
                            <td>{{ $room->status }}</td>
                            <td>{{ $room->details }}</td>
                            <td>{{ $room->discount }}</td>
                            <td>
                                <a href="{{ route('sa.update.room', $room->id) }}" class="btn btn-danger">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        @include('includes.sidebar')
    </div>
@endsection
