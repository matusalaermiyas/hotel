@extends('layouts.master')

@section('title', 'Ayu Hotel | Ask Leave')

@section('content')

    <style>
        .reception-list {
            margin-bottom: 20px;
        }
    </style>

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">
            <h1>Leave Asking Form</h1>
            <form action="{{ route('reception.store.leave') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <select name="reason" id="reason" class="form-control">
                        <option value="sick">Sick</option>
                        <option value="vacation">Vacation</option>
                        <option value="pregnancy">Pregnancy</option>
                    </select>
                </div>
                @include('includes.text_input', [
                    'id' => 'leave_date',
                    'type' => 'date',
                    'label' => 'Leave Date',
                ])
                @include('includes.text_input', [
                    'id' => 'return_date',
                    'type' => 'date',
                    'label' => 'Return Date',
                ])
                <button type="submit" class="btn btn-primary">Ask</button>
            </form>
        </section>

        @include('includes.sidebar')

    </div>
@endsection
