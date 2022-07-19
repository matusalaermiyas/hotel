@extends('layouts.master')

@section('title', 'Ayu Hotel | Authorize Payroll')

@section('content')

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">
            <h1>Authroize Payroll</h1>

            @foreach ($employees as $e)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Employee Payroll
                    </div>

                    <div class="panel-body">
                        <p>Salary :{{ $e->salary }}</p>
                        <p>Action : <a href="{{ route('manager.authorize.employee.payroll', $e->id) }}"
                                class="btn btn-primary">Authorize Payroll</a></p>
                    </div>
                </div>
            @endforeach
        </section>

        @include('includes.sidebar')

    </div>
@endsection
