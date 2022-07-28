@extends('layouts.master')

@section('title', 'Ayu Hotel | Gallery')

@section('content')
    <style>
        img {
            width: 100%;
            object-fit: cover
        }
    </style>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/bar.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/bed.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/bedroom.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/buffet.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/cafe.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/drinking.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/jackozie.jpg') }} " alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/meeting_hall.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/place.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/sitting.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/sofa.jpg') }}" alt="Gallery">
        </div>
        <div class="col-sm-4">
            <img src="{{ asset('/images/gallery_/terrace.jpg') }}" alt="Gallery">
        </div>
    </div>
@endsection
