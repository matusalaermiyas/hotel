@extends('layouts.master')

@section('title', 'Ayu Hotel | Change Password')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <form action="{{ route('auth.change.post') }}" method="POST">
                @csrf
                @include('includes.text_input', [
                    'id' => 'old_password',
                    'label' => 'Old Password',
                    'type' => 'password',
                ])
                @include('includes.text_input', [
                    'id' => 'new_password',
                    'label' => 'New Password',
                    'type' => 'password',
                ])
                @include('includes.text_input', [
                    'id' => 'confirm_password',
                    'label' => 'Confirm Password',
                    'type' => 'password',
                ])

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </section>

        @include('includes.sidebar')


    </div>
@endsection
