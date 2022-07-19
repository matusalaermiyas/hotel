@extends('layouts.master')

@section('title', 'Ayu Hotel | Leave Request Result')

@section('content')

    <div class="row" style="margin-top: 50px">
        <section class="col-sm-8">

            @foreach ($leaves as $l)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Leave Request Result
                    </div>

                    <div class="panel-body">
                        <p>Leave Reason : <span style="text-transform: capitalize">{{ $l->reason }}</span></p>
                        <p>Result :

                            @if ($l->approved)
                                Leave Accepted
                            @else
                                Leave Not Accepted
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </section>

        @include('includes.sidebar')

    </div>
@endsection
