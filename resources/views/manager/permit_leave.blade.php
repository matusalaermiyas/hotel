@extends('layouts.master')

@section('title', 'Ayu Hotel | Permit Leave')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1>Permit Leave</h1>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Leave Date</th>
                    <th>Return Date</th>
                    <th>Approved</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($leave_requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->employee_id }}</td>
                            <td>{{ $request->reason }}</td>

                            @if ($request->other_details)
                                <td>{{ $request->other_details }}</td>
                            @else
                                <td>Empty</td>
                            @endif



                            <td>{{ $request->leave_date }}</td>
                            <td>{{ $request->return_date }}</td>
                            <td>
                                @if ($request->approved)
                                    {{ 'Approved' }}
                                @else
                                    {{ 'Not Approved' }}
                                @endif
                            </td>
                            <td>
                                @if ($request->approved)
                                    <button class="btn btn-primary">Leave Approved</button>
                                @else
                                    <a class="btn btn-primary"
                                        href="{{ route('manager.approve.leave', $request->id) }}">Approve
                                        Leave</a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </div>
@endsection
