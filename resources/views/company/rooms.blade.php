@extends('layouts.master')

@section('title', 'Ayu Hotel | Rooms')

@section('content')
    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 0px;
            border-radius: 7px;
            overflow: hidden;
            margin-bottom: 10px;
            width: 100%;
            height: 450px;
        }

        .card-content {
            padding-left: 10px;
            font-weight: bold
        }

        .cap {
            text-transform: capitalize
        }
    </style>
    <div class="container">
        <div class="row">
            <section class="col-sm-8">
                <h1>Our Rooms</h1>
                @foreach ($rooms as $r)
                    <div class="card">
                        <img src="{{ asset($r->room_picture) }}" alt="Room Picture"
                            style="object-fit: cover; width: 100%; height: 350px">

                        <div class="card-content">
                            <p>Price : {{ $r->price }} Birr</p>
                            <p>Room Type : <span class="cap">{{ $r->room_type }}</span></p>
                            <p>Floor Number : {{ $r->floor_no }}</p>
                        </div>
                    </div>
                @endforeach
            </section>
            @include('includes.sidebar')
        </div>

    </div>
@endsection
