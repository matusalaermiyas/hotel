@extends('layouts.master')

@section('title', 'Welcome | To Our Hotel')

@section('content')

    <div class="row">
        <div class="col-sm-4">
            <form action="/customer/reserve" method="POST">
                @csrf
                <div class="form-group">
                    <label for="arrival_date">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Nights</label>
                    <input type="number" name="nights" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Rooms</label>
                    <input type="number" name="rooms" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Adults</label>
                    <input type="number" name="adults" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Childern</label>
                    <input type="number" name="children" id="" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Reserve</button>
                </div>
            </form>
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

@endsection
