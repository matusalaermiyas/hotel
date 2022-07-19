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
                                    <img src="{{ $comment->picture }}" alt="Feedback" class="comment-img">
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
                    <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat. Sed
                        sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a viverra augue
                        ipsum et diam.
                        Sed condimentum, libero sed cursus dapibus, libero enim feugiat tellus, vitae accumsan elit neque et
                        purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec nisl placerat enim imperdiet dignissim.
                        Maecenas sit amet nunc vel ligula tempor cursus. Sed faucibus faucibus eros. Praesent pharetra wisi
                        ut sem. Morbi dignissim pulvinar dui.</p>
                </section>
                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Latest News</h1>
                    <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat. Sed
                        sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a viverra augue
                        ipsum et diam.
                        Sed condimentum, libero sed cursus dapibus, libero enim feugiat tellus, vitae accumsan elit neque et
                        purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec nisl placerat enim imperdiet dignissim.
                        Maecenas sit amet nunc vel ligula tempor cursus. Sed faucibus faucibus eros. Praesent pharetra wisi
                        ut sem. Morbi dignissim pulvinar dui.</p>
                </section>
                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Locations</h1>
                    <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat. Sed
                        sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a viverra augue
                        ipsum et diam.
                        Sed condimentum, libero sed cursus dapibus, libero enim feugiat tellus, vitae accumsan elit neque et
                        purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec nisl placerat enim imperdiet dignissim.
                        Maecenas sit amet nunc vel ligula tempor cursus. Sed faucibus faucibus eros. Praesent pharetra wisi
                        ut sem. Morbi dignissim pulvinar dui.</p>
                </section>
                <section data-aos="fade-up" data-aos-duration="1000">
                    <h1>Our services</h1>
                    <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat. Sed
                        sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a viverra augue
                        ipsum et diam.
                        Sed condimentum, libero sed cursus dapibus, libero enim feugiat tellus, vitae accumsan elit neque et
                        purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec nisl placerat enim imperdiet dignissim.
                        Maecenas sit amet nunc vel ligula tempor cursus. Sed faucibus faucibus eros. Praesent pharetra wisi
                        ut sem. Morbi dignissim pulvinar dui.</p>
                </section>


            </div>
            @include('includes.sidebar')
        </div>

    </div>
@endsection
