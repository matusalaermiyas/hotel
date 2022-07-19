@extends('layouts.master')

@section('title', 'Ayu Hotel | View Authorized Payroll')

@section('content')

    <style>
        .reception-list {
            margin-bottom: 20px;
        }
    </style>

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">
            <h1>Authorized Payrolls</h1>
            <table class="table table-striped" id="table">
                <thead>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Salary</th>
                    <th>Authorized Date</th>
                </thead>

                <tbody>
                    @foreach ($payrolls as $p)
                        <td>{{ $p->employee->id }}</td>
                        <td>{{ $p->employee->first_name }} {{ $p->employee->middle_name }}</td>
                        <td>{{ $p->salary }}</td>
                        <td>{{ $p->authorize_date }}</td>
                    @endforeach
                </tbody>
            </table>
        </section>

        @include('includes.sidebar')

    </div>
@endsection
