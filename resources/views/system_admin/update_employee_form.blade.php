@extends('layouts.master')

@section('title', 'Ayu Hotel | Update Employee')

@section('content')
    <div class="row">
        <section class="col-sm-8">
            <h1>Update Employee</h1>
            <form action="{{ route('sa.update.employee.store', $employee->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="profile_picture" value="{{ $employee->profile }}">
                @include('includes.text_input', [
                    'id' => 'first_name',
                    'label' => 'First Name',
                    'value' => $employee->first_name,
                ])
                @include('includes.text_input', [
                    'id' => 'middle_name',
                    'label' => 'Middle Name',
                    'value' => $employee->middle_name,
                ])
                @include('includes.text_input', [
                    'id' => 'last_name',
                    'label' => 'Last Name',
                    'value' => $employee->last_name,
                ])
                @include('includes.text_input', [
                    'id' => 'salary',
                    'label' => 'Salary',
                    'value' => $employee->salary,
                ])
                @include('includes.text_input', [
                    'id' => 'office_telephone',
                    'label' => 'Office Telephone',
                    'value' => $employee->office_telephone,
                ])
                @include('includes.text_input', [
                    'id' => 'mobile_phone',
                    'label' => 'Mobile Telephone',
                    'value' => $employee->mobile_phone,
                ])
                @include('includes.text_input', [
                    'id' => 'age',
                    'label' => 'Age',
                    'value' => $employee->age,
                ])

                <div class="form-group">
                    <select name="job_title" id="job_title" class="form-control">
                        <option value="casher" @if ($employee->job_title == 'casher') selected @endif>Casher</option>
                        <option value="reception" @if ($employee->job_title == 'reception') selected @endif>Reception</option>
                        <option value="manager" @if ($employee->job_title == 'manager') selected @endif>Manager</option>
                    </select>
                </div>

                @include('includes.text_input', [
                    'id' => 'dob',
                    'label' => 'Date of birth',
                    'type' => 'date',
                    'value' => $employee->dob,
                ])

                @include('includes.text_input', [
                    'id' => 'profile',
                    'label' => 'Profile',
                    'type' => 'file',
                ])
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


            </form>
        </section>
    </div>
@endsection
