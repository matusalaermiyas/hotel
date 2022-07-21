@extends('layouts.master')

@section('title', 'Welcome | To Our Hotel')

@section('content')

    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 0px;
            border-radius: 7px;
            overflow: hidden;
            padding: 10px;
        }
    </style>

    <div class="row" style="margin-top: 10px">
        <div class="col-sm-4 card">
            <form action="/customer/reserve" method="POST">
                @csrf
                @include('includes.text_input', [
                    'id' => 'arrival_date',
                    'label' => 'Arrival Date',
                    'type' => 'date',
                ])

                @include('includes.text_input', [
                    'id' => 'nights',
                    'label' => 'Nights',
                    'type' => 'number',
                ])

                @include('includes.text_input', [
                    'id' => 'rooms',
                    'label' => 'Rooms',
                    'type' => 'number',
                ])

                @include('includes.text_input', [
                    'id' => 'adults',
                    'label' => 'Adults',
                    'type' => 'number',
                ])
                @include('includes.text_input', [
                    'id' => 'children',
                    'label' => 'Children',
                    'type' => 'number',
                ])


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Reserve</button>
                </div>
            </form>
        </div>
        <div class="col-sm-5">
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

@endsection
