@extends('layouts.master')

@section('title', 'Ayu Hotel | Delete Employee')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1 style="font-size: 15px">Delete Employee</h1>

            <table class="table" id="table">
                <thead>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Salary</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                    <th>Office Telephone</th>
                    <th>Mobile Phone</th>
                    <th>Job Title</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($employees as $emp)
                        <tr>
                            <td>{{ $emp->id }}</td>
                            <td>{{ $emp->first_name }}</td>
                            <td>{{ $emp->middle_name }}</td>
                            <td>{{ $emp->last_name }}</td>
                            <td>{{ $emp->salary }}</td>
                            <td>{{ $emp->dob }}</td>
                            <td>{{ $emp->age }}</td>
                            <td>{{ $emp->office_telephone }}</td>
                            <td>{{ $emp->mobile_phone }}</td>
                            <td>{{ $emp->job_title }}</td>
                            <td>
                                <a href="{{ route('sa.update.form', $emp->id) }}" class="btn btn-danger">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </div>
@endsection
