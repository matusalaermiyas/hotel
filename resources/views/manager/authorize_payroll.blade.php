@extends('layouts.master')

@section('title', 'Ayu Hotel | Authorize Payroll')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1>Authroize Payroll</h1>

            @foreach ($employees as $e)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Employee Payroll
                    </div>

                    <div class="panel-body">
                        <p>Name : {{ $e->first_name }}</p>
                        <p>Job Title :{{ $e->job_title }}</p>
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
