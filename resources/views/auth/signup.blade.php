@extends('layouts.master')

@section('title', 'Ayu | Signup')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->all()[0] }}
                </div>
            @endif
            <div class="col-sm-8">
                <form action="{{ route('auth.signup.post') }}" method="POST">
                    @csrf
                    @include('includes.text_input', [
                        'id' => 'first_name',
                        'label' => 'First Name',
                    ])
                    @include('includes.text_input', ['id' => 'last_name', 'label' => 'Last Name'])
                    @include('includes.text_input', ['id' => 'age', 'label' => 'Age'])
                    @include('includes.text_input', ['id' => 'city', 'label' => 'City'])
                    @include('includes.text_input', [
                        'id' => 'state_or_province',
                        'label' => 'State/Province',
                    ])
                    @include('includes.text_input', ['id' => 'country', 'label' => 'Country'])
                    @include('includes.text_input', ['id' => 'telephone', 'label' => 'Telephone'])
                    @include('includes.text_input', ['id' => 'email', 'label' => 'Email'])
                    @include('includes.text_input', ['id' => 'username', 'label' => 'Username'])
                    @include('includes.text_input', [
                        'id' => 'password',
                        'label' => 'Password',
                        'type' => 'password',
                    ])
                    @include('includes.text_input', [
                        'id' => 'confirm_password',
                        'label' => 'Confirm password',
                        'type' => 'password',
                    ])
                    <div class="form-group">
                        <p style="font-size: 14px; font-weight: bold">
                            Gender

                            <label>
                                <input type="radio" name="gender" value="male">Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="female">Female
                            </label>
                        </p>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Signup</button>
                    </div>

                </form>
            </div>

            @include('includes.sidebar')
        </div>
    </div>
@endsection
