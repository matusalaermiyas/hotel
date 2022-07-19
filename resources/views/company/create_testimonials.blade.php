@extends('layouts.master')

@section('title', 'Ayu Hotel | Give Comment')

@section('content')
    <div class="container">
        <div class="row">
            <section class="col-sm-8">
                <form action="{{ route('customer.comment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('includes.text_input', ['id' => 'full_name', 'label' => 'Full Name'])
                    <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Feedback" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" name="picture" id="picture" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </div>
                </form>
            </section>
        </div>

    </div>
@endsection
