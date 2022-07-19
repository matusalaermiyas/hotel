@extends('layouts.master')

@section('title', 'Ayu Hotel | Create Employee Account')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1 style="font-size: 15px">Create Employee Account</h1>

            <form action="{{ route('sa.create.account.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="employee">Employee</label>
                    <select name="employee" id="employee" class="form-control">
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                @include('includes.text_input', ['id' => 'username', 'label' => 'Username'])
                @include('includes.text_input', ['id' => 'password', 'label' => 'Password'])

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </section>

        @include('includes.sidebar')
    </div>
@endsection
