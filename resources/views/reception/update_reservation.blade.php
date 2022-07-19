@extends('layouts.master')

@section('title', 'Ayu Hotel | Update Reservations')

@section('content')

    <div class="row">
        <section class="col-sm-10">
            <p>Customer reservations</p>

            <table class="table table-responsive" id="table">
                <th>Reservation ID</th>
                <th>Nights</th>
                <th>Adults</th>
                <th>Children</th>
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
                            <td>{{ $res->nights }}</td>
                            <td>{{ $res->adults }}</td>
                            <td>{{ $res->children }}</td>
                            <td>
                                @if ($res->room)
                                    <img src="{{ $res->room->room_picture }}" alt="Room Picture"
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
                                <a href="{{ route('reception.update.reservation', $res->id) }}"
                                    class="btn btn-primary">Update
                                    Reservation</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        @include('includes.sidebar')
    </div>
@endsection
