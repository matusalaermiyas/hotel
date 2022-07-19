@extends('layouts.master')

@section('title', 'Ayu Hotel | Generate Report')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1 style="font-size: 15px">Casher Report</h1>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>Role</th>
                    <th>Casher Id</th>
                    <th>Description</th>
                    <th>Occured At</th>
                </thead>

                <tbody>
                    @foreach ($reports as $rep)
                        <tr>
                            <td>{{ $rep->role }}</td>
                            <td>{{ $rep->employee_id }}</td>
                            <td>{{ $rep->description }}</td>
                            <td>{{ $rep->created_at }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </div>
@endsection
