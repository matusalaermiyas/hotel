@extends('layouts.master')

@section('title', 'Ayu Hotel | Manager Dashboard')

@section('content')

    <style>
        .list {
            margin-bottom: 10px;
        }
    </style>

    <div class="row">
        <section class="col-sm-8">
            <h1>Welcome Manager</h1>
            <ul class="list-unstyled">
                <li class="list"><a href="{{ route('manager.view.comments') }}" class="btn btn-primary">View comments</a>
                </li>
                <li class="list"><a href="{{ route('manager.permit.leave') }}" class="btn btn-primary">Permit Leave</a>
                </li>
                <li class="list"><a href="{{ route('manager.authorize.payroll') }}" class="btn btn-primary">Authorize
                        Payroll</a></li>

                <li class="list"><a href="{{ route('auth.change.password') }}" class="btn btn-primary">Change
                        Password</a></li>

                <li class="list"><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></li>

            </ul>
        </section>


    </div>
@endsection
