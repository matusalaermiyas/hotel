@extends('layouts.master')

@section('title', 'Ayu Hotel | Cancel Reservation')

@section('content')

    <div class="row">
        <section class="col-sm-12">
            <p>Cancel Reservation</p>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>Reservation ID</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Rooms</th>
                    <th>Room Picture</th>
                    <th>Room Type</th>
                    <th>Arrival Date</th>
                    <th>Departure Date</th>
                    <th>Reserved</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($reservations as $res)
                        <tr>
                            <td>{{ $res->reservation_id }}</td>
                            <td>{{ $res->adults }}</td>
                            <td>{{ $res->children }}</td>
                            <td>{{ $res->rooms }}</td>
                            <td>
                                @if ($res->room)
                                    <img src="{{ asset($res->room->room_picture) }}" alt="Room Picture"
                                        style="width: 100%; height: 30px; object-fit: contain">
                                @else
                                    Room Not Found Maybe Deleted
                                @endif
                            </td>
                            <td style="text-transform: capitalize">
                                @if ($res->room)
                                    {{ $res->room->room_type }}
                                @else
                                    Room Not Found Maybe Deleted
                                @endif
                            </td>

                            <td>{{ $res->arrival_date }}</td>
                            <td>{{ $res->departure_date }}</td>
                            <td>
                                @if ($res->reserved)
                                    Reserved
                                @else
                                    Not reserved, waiting reception
                                @endif
                            </td>
                            <td>

                                @if ($res->reserved)
                                    <button class="btn btn-primary">Room Reserved</button>
                                @else
                                    <a href="{{ route('reception.cancel.reservation', $res->id) }}"
                                        class="btn btn-danger">Cancel
                                        Reservation</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
