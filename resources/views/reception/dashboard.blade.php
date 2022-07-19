@extends('layouts.master')

@section('title', 'Ayu Hotel | Reception Dashboard')

@section('content')

    <style>
        .reception-list {
            margin-bottom: 20px;
        }
    </style>

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">
            <h1>Welcome Reception</h1>
            <ul class="list-unstyled">
                <li class="reception-list"><a href="{{ route('reception.reservations') }}" class="btn btn-primary">
                        Reservations</a></li>
                <li class="reception-list"><a href="{{ route('reception.reserve.book') }}" class="btn btn-primary">Book
                        Reservation</a></li>
                <li class="reception-list"><a href="{{ route('reception.cancel') }}" class="btn btn-primary">Cancel
                        Reservation</a></li>
                <li class="reception-list"><a href="{{ route('reception.update') }}" class="btn btn-primary">Update
                        Reservation</a></li>

                <li class="reception-list"><a href="{{ route('reception.ask.leave') }}" class="btn btn-primary">Ask For
                        leave</a></li>

                <li class="reception-list"><a href="{{ route('reception.see.leave.result') }}" class="btn btn-primary">See
                        Leave Request
                        Result</a></li>

                <li class="reception-list"><a href="{{ route('reception.generate.report') }}"
                        class="btn btn-primary">Generate Report</a></li>
                <li class="reception-list"><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></li>

            </ul>
        </section>

        @include('includes.sidebar')

    </div>
@endsection
