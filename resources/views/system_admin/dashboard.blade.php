@extends('layouts.master')

@section('title', 'Ayu Hotel | System Admin Dashboard')

@section('content')

    <style>
        .list {
            margin-bottom: 10px;
        }
    </style>

    <div class="row">
        <section class="col-sm-8">
            <h1>Welcome System Admin</h1>
            <ul class="list-unstyled">
                <li class="list"><a href="{{ route('system_admin.add.room') }}" class="btn btn-primary">Add Room</a>
                </li>
                <li class="list"><a href="{{ route('sa.view.rooms') }}" class="btn btn-primary">View Rooms</a>
                </li>
                <li class="list"><a href="{{ route('system_admin.delete.room') }}" class="btn btn-primary">Delete
                        Room</a>
                </li>
                <li class="list"><a href="{{ route('system_admin.update.room') }}" class="btn btn-primary">Update Room
                    </a></li>
                <li class="list"><a href="{{ route('system_admin.view.employees') }}" class="btn btn-primary">View
                        Employees
                    </a></li>
                <li class="list"><a href="{{ route('sa.create.account') }}" class="btn btn-primary">Add (Create)
                        Employee Account</a>
                </li>

                <li class="list"><a href="{{ route('system_admin.add.employee') }}" class="btn btn-primary">Add
                        Employee</a></li>
                <li class="list"><a href="{{ route('system_admin.update.employee') }}" class="btn btn-primary">Update
                        Employee</a></li>
                <li class="list"><a href="{{ route('system_admin.terminate.employee') }}"
                        class="btn btn-primary">Terminate
                        Employee</a></li>

                <li class="reception-list"><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></li>

            </ul>
        </section>

        @include('includes.sidebar')
    </div>
@endsection
