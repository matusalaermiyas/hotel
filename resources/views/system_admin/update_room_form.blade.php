@extends('layouts.master')

@section('title', 'Ayu Hotel | Update Employee')

@section('content')
    <div class="row">
        <section class="col-sm-8">
            <h1>Update Room</h1>
            <form action="{{ route('sa.update.room.store', $room->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="room_picture_" value="{{ $room->room_picture }}">

                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <select name="room_type" id="room_type" class="form-control">
                        <option value="single" @if ($room->room_type == 'single') selected @endif>Single</option>
                        <option value="family" @if ($room->room_type == 'family') selected @endif>Family</option>
                        <option value="twin" @if ($room->room_type == 'twin') selected @endif>Twin</option>
                    </select>
                </div>


                @include('includes.text_input', [
                    'id' => 'price',
                    'label' => 'Price',
                    'value' => $room->price,
                ])
                @include('includes.text_input', [
                    'id' => 'floor_no',
                    'label' => 'Floor Number',
                    'value' => $room->floor_no,
                ])
                @include('includes.text_input', [
                    'id' => 'max_guest',
                    'label' => 'Max Guest',
                    'value' => $room->max_guest,
                ])
                @include('includes.text_input', [
                    'id' => 'details',
                    'label' => 'Details',
                    'value' => $room->details,
                ])

                @include('includes.text_input', [
                    'id' => 'status',
                    'label' => 'Status',
                    'value' => $room->status,
                ])

                @include('includes.text_input', [
                    'id' => 'discount',
                    'label' => 'Discount',
                    'value' => $room->discount,
                ])

                @include('includes.text_input', [
                    'id' => 'available_rooms',
                    'label' => 'Number Of Available Rooms',
                    'value' => $room->available_rooms,
                ])

                @include('includes.text_input', [
                    'id' => 'room_picture',
                    'label' => 'Room Picture',
                    'type' => 'file',
                ])

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


            </form>
        </section>
    </div>
@endsection
