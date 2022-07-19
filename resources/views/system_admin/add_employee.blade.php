@extends('layouts.master')

@section('title', 'Ayu Hotel | Add Employee')

@section('content')
    <div class="row">
        <section class="col-sm-8">
            <h1>Adding Employee</h1>
            <form action="{{ route('sa.add.employee') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('includes.text_input', ['id' => 'first_name', 'label' => 'First Name'])
                @include('includes.text_input', ['id' => 'middle_name', 'label' => 'Middle Name'])
                @include('includes.text_input', ['id' => 'last_name', 'label' => 'Last Name'])
                @include('includes.text_input', ['id' => 'salary', 'label' => 'Salary'])
                @include('includes.text_input', [
                    'id' => 'office_telephone',
                    'label' => 'Office Telephone',
                ])
                @include('includes.text_input', [
                    'id' => 'mobile_phone',
                    'label' => 'Mobile Telephone',
                ])
                @include('includes.text_input', [
                    'id' => 'age',
                    'label' => 'Age',
                ])

                <div class="form-group">
                    <select name="job_title" id="job_title" class="form-control">
                        <option value="reception" @if ($employee->job_title == 'reception') selected @endif>Reception</option>
                        <option value="casher" @if ($employee->job_title == 'casher') selected @endif>Casher</option>
                        <option value="manager" @if ($employee->job_title == 'manager') selected @endif>Manager</option>
                    </select>
                </div>


                @include('includes.text_input', [
                    'id' => 'dob',
                    'label' => 'Date of birth',
                    'type' => 'date',
                ])

                @include('includes.text_input', [
                    'id' => 'profile',
                    'label' => 'Profile',
                    'type' => 'file',
                ])
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>


            </form>
        </section>
    </div>
@endsection
