@extends('layouts.master')

@section('title', 'Ayu Hotel | Add Room')

@section('content')
    <div class="row">
        <section class="col-sm-8">
            <h1>Add Room</h1>
            <form action="{{ route('sa.add.room') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" class="form-control">
                        <option value="single">Single</option>
                        <option value="family">Family</option>
                        <option value="twin">Twin</option>
                    </select>
                </div>


                @include('includes.text_input', ['id' => 'price', 'label' => 'Price'])
                @include('includes.text_input', ['id' => 'floor_no', 'label' => 'Floor Number'])
                @include('includes.text_input', ['id' => 'max_guest', 'label' => 'Max Guest'])
                @include('includes.text_input', ['id' => 'details', 'label' => 'Details'])
                @include('includes.text_input', ['id' => 'discount', 'label' => 'Discount'])
                @include('includes.text_input', [
                    'id' => 'room_picture',
                    'label' => 'Room Picture',
                    'type' => 'file',
                ])




                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>


            </form>
        </section>
    </div>
@endsection
