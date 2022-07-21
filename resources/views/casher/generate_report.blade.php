@extends('layouts.master')

@section('title', 'Ayu Hotel | Casher Generate Report')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1 style="font-size: 15px">Casher Report</h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    Generated Report
                </div>

                <div class="panel-body">
                    <p>Number Of Authorized Payrolls : {{ $number_of_authorized }}</p>
                    <p>Total Amount of Authorized Payrolls : {{ $amount }}</p>
                </div>
            </div>
        </section>


    </div>
@endsection
