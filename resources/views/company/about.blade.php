@extends('layouts.master')

@section('title', 'Ayu Hotel | About')

@section('content')
    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 0px;
            border-radius: 7px;
            overflow: hidden;
            margin-bottom: 10px;
            width: 100%;
            height: 400px;
        }
    </style>
    <div class="container">
        <div class="row">
            <section class="col-sm-8">
                <h1>Our Services</h1>
                <div class="card">
                    <img src="/images/about/about_us.jpg" alt="About us" style="object-fit: cover" width="100%">
                </div>
                <p style="margin-top: 10px">
                    Ayu hotel provides its customers with the highest standard of service and is committed to do that for
                    all
                    its
                    respected guests. In addition to the existing accommodation, we are constructing additional 77 luxury
                    rooms,
                    ballroom and restaurant to meet the ever-growing customer demand. In short, we are here to give you a
                    service
                    for your highest level of satisfaction.
                    Services</p>
                <ul class="list-unstyled">
                    <li data-aos="fade-up" data-aos-duration="1000"> <span class="glyphicon glyphicon-hand-right"></span>
                        Fast
                        WIFI Internet in every corner.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"> <span class="glyphicon glyphicon-hand-right"></span>
                        Complimentary breakfast.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span> 24
                        hours front desk service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Wake
                        up call.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Laundry service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span> Car
                        rental service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Convenient restaurant and bar service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Fast
                        and convenient room service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        DSTV
                        and many free channels in each room.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Clean rooms with private terrace and quiet
                        surroundings.
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Delicious meals.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Well-trained and very cooperative staff.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Very
                        convenient for town taxi service.</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Free
                        parking</li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        First class restaurant with international menu.
                    </li>
                    <li data-aos="fade-up" data-aos-duration="1000"><span class="glyphicon glyphicon-hand-right"></span>
                        Meeting halls with all required accessories.</li>
                </ul>
            </section>
            @include('includes.sidebar')
        </div>

    </div>
@endsection
