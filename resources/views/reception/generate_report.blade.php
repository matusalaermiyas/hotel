@extends('layouts.master')

@section('title', 'Ayu Hotel | Generate Report')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1 style="font-size: 15px">Reception Report</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    Generate Report
                </div>

                <div class="panel-body">
                    <p>Number of Reserved Rooms : {{ $number_of_reserved_rooms }}</p>
                    <p>Rooms Available : {{ $rooms }}</p>
                </div>
            </div>
        </section>


    </div>
@endsection
