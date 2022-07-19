@extends('layouts.master')

@section('title', 'Ayu Hotel | Permit Leave')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1>Permit Leave</h1>

            <table class="table table-responsive">
                <thead>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Reason</th>
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
                                <a class="btn btn-primary" href="{{ route('manager.approve.leave', $request->id) }}">Approve
                                    Leave</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </div>
@endsection
