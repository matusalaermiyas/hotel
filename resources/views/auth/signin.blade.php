@extends('layouts.master')

@section('title', 'Ayu Hotel | Signin')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <form action="{{ route('auth.signin.post') }}" method="POST">
                @csrf
                @include('includes.text_input', ['id' => 'username', 'label' => 'Username'])
                @include('includes.text_input', [
                    'id' => 'password',
                    'label' => 'Password',
                    'type' => 'password',
                ])
                <p><a href="{{ route('auth.signup') }}">Don't have an account, create</a></p>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </section>

        @include('includes.sidebar')


    </div>
@endsection
