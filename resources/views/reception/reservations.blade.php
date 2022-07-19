@extends('layouts.master')

@section('title', 'Ayu Hotel | Viewing Reservations')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <p>Customer reservations</p>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>Reservation ID</th>
                    <th>Nights</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Room Type</th>
                    <th>Arrival Date</th>
                    <th>Departure Date</th>
                    <th>Reserved</th>
                </thead>

                <tbody>
                    @foreach ($reservations as $res)
                        <tr>
                            <td>{{ $res->reservation_id }}</td>
                            <td>{{ $res->nights }}</td>
                            <td>{{ $res->adults }}</td>
                            <td>{{ $res->children }}</td>
                            <td style="text-transform: capitalize">{{ $res->room->room_type }}</td>
                            <td>{{ $res->arrival_date }}</td>
                            <td>{{ $res->departure_date }}</td>
                            <td>
                                @if ($res->reserved)
                                    Reserved
                                @else
                                    Not reserved, waiting reception
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        @include('includes.sidebar')
    </div>
@endsection
