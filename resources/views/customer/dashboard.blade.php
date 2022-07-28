@extends('layouts.master')

@section('title', 'Ayu Hotel | Customer Dashboard')

@section('content')

    <style>
        .reception-list {
            margin-bottom: 20px;
        }
    </style>

    <div class="row">
        <section class="col-sm-8">
            <h1>Welcome Our Customer</h1>
            <ul class="list-unstyled">
                <li class="reception-list"><a href="{{ route('customer.reservations') }}" class="btn btn-primary">My
                        Reservations</a></li>
                <li class="reception-list"><a href="{{ route('customer.cancel.reservations') }}" class="btn btn-primary">Cancel
                        Reservation</a></li>
                <li class="reception-list"><a href="{{ route('customer.update.reservations') }}"
                        class="btn btn-primary">Update
                        Reservation</a></li>
                <li class="reception-list"><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></li>
            </ul>
        </section>

        @include('includes.sidebar')

    </div>
@endsection
