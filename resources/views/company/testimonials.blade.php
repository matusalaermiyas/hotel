@extends('layouts.master')

@section('title', 'Ayu Hotel | Testimonials')

@section('content')

    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 0px;
            border-radius: 7px;
            margin-right: 20px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .comment-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .comment-content {
            padding-left: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 animate__animated animate__fadeInLeft" style="padding: 0">
                        <p><a href="{{ route('customer.comment') }}" class="btn btn-primary">Give Feedback</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="padding: 0">
                        <p style="font-weight: bold; font-size: 17px">Feedbacks</p>
                    </div>
                    <section class="col-sm-12">
                        @foreach ($comments as $comment)
                            <div class="row">
                                <div class="col-sm-8 card" data-aos="fade-up" data-aos-duration="1000">
                                    <img src="{{ asset($comment->picture) }}" alt="Feedback" class="comment-img">
                                    <div class="comment-content">
                                        <p>{{ $comment->full_name }}</p>
                                        <p>{{ $comment->feedback }}</p>
                                        <p style="font-style: italics">{{ $comment->sent_time }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
            <div class="col-sm-4">
                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Welcome to our hotel</h1>
                    <p>Featuring free WiFi throughout the property, Ayu International Hotel offers accommodation in
                        Adama. Free private parking is available on site. Every room at this hotel is air conditioned and
                        comes
                        with a flat-screen TV. Some rooms have a seating area to relax in after a busy day. Rooms have a
                        private
                        bathroom. For your comfort, you will find slippers and a hairdryer. There is a 24-hour front desk at
                        the
                        property. Addis Ababa Bole International Airport is 72 km from the property.</p>

                </section>
                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Latest News</h1>
                    <p>
                        The current pandemic situation forces us all to look for non-standard solutions. Especially working
                        people, who currently perform their duties remotely from home, need appropriate conditions to work
                        as
                        efficiently as in the office. Unfortunately, at home, it is often difficult to implement. Facing
                        these
                        difficulties, the Grand Royal Hotel has prepared a unique offer for you to use our hotel rooms as a
                        remote office. Read today's article and find out why you should use our package.

                        Remote work from home is not a problem for some. However, many people are not used to it, especially
                        when their home does not provide them with the necessary conditions for full concentration. The
                        presence
                        of other household members, including children, effectively distracts us from our duties and makes
                        us
                        less effective. If you are struggling with this problem and you cannot fully focus on work, while
                        staying at home, get to know the attractive offer of the Ayu International Hotel.

                    </p>
                </section>

                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Our services</h1>
                    <section>
                        <h2 style="font-size: 20px">Restaurant</h2>
                        <p>Ayu International Hotel bar and restaurant offers variety of drinks and delicious food.  This
                            hotel
                            in Adama ensures that guests get quality services. This hotel in Adama offers both local and
                            international cuisine at their deluxe restaurants. The comfortable bar will provide you with
                            comfortable environment to relax and enjoy with friends.
                        </p>
                    </section>

                    <section>
                        <h2 style="font-size: 20px">Meeting and Event</h2>

                        <p>The rich offer of our hotel perfectly meets the expectations of entrepreneurs looking for a
                            professional and well-equipped room for a company event, conference or training. Convenient
                            location, spacious rooms with full equipment and qualified staff make the Ayu Int Hotel the
                            perfect
                            hotel for the Conference and Meetings</p>


                        <p>
                            We have three multi-functional rooms of different sizes - the largest of them is able to easily
                            accommodate up to 300 people. We offer modern conference rooms with rich equipment and
                            advanced
                            audiovisual equipment, which allows for a fully professional conduct of each presentation. The
                            rooms
                            are
                            located on the ground floor, ensuring convenient organization of any company meetings,
                            conferences
                            or
                            training sessions.
                        </p>

                    </section>
                </section>
            </div>
            @include('includes.sidebar')
        </div>

    </div>
@endsection
