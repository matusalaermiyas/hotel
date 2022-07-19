@extends('layouts.master')

@section('title', 'Ayu Hotel | Viewing Comments')

@section('content')

    <div class="row">
        <section class="col-sm-8">
            <h1>Comments</h1>

            <table class="table table-responsive" id="table">
                <thead>
                    <th>ID</th>
                    <th>Feedback Date</th>
                    <th>Name</th>
                    <th>Feedback</th>
                    <th>Approved</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->sent_time }}</td>
                            <td>{{ $comment->full_name }}</td>
                            <td>{{ $comment->feedback }}</td>
                            <td>
                                @if ($comment->approved)
                                    {{ 'Approved' }}
                                @else
                                    {{ 'Not Approved' }}
                                @endif
                            </td>
                            <td>
                                @if ($comment->approved)
                                    <button class="btn btn-primary">Approved</button>
                                @else
                                    <a class="btn btn-primary"
                                        href="{{ route('manager.approve.comment', $comment->id) }}">Approve
                                        Comment</a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
