@extends('layouts.master')

@section('title', 'Ayu Hotel | Leave Request Result')

@section('content')

    <div class="row">
        <section class="col-sm-8">

            @foreach ($leaves as $l)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Leave Request Result
                    </div>

                    <div class="panel-body">
                        <p>Leave Reason : <span style="text-transform: capitalize">{{ $l->reason }}</span></p>

                        @if ($l->other_details)
                            <p>Leave Description : <span style="text-transform: capitalize">{{ $l->other_details }}</span>
                            </p>
                        @endif

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
