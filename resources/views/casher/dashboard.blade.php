@extends('layouts.master')

@section('title', 'Ayu Hotel | Casher Dashboard')

@section('content')

    <style>
        .reception-list {
            margin-bottom: 20px;
        }
    </style>

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">
            <h1>Welcome Casher</h1>
            <ul class="list-unstyled">
                <li class="reception-list"><a href="{{ route('casher.view.authorized.payroll') }}"
                        class="btn btn-primary">View
                        Authorized Payroll</a></li>
                <li class="reception-list"><a href="{{ route('casher.generate.report') }}" class="btn btn-primary">Generate
                        Report</a></li>
                <li class="reception-list"><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></li>
            </ul>
        </section>

        @include('includes.sidebar')

    </div>
@endsection
