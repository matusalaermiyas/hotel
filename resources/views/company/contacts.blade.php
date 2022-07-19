@extends('layouts.master')

@section('title', 'Ayu Hotel | Contacts')

@section('content')
    <div class="container">
        <div class="row">
            <section class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="animate__animated animate__fadeInLeft">You can contact us using</h1>
                        <p style="font-weight: bold; font-size: 17px">Office Phone: <span
                                class="glyphicon glyphicon-phone-alt"></span>
                            +0221126587</p>
                        <p style="font-weight: bold; font-size: 17px">Email: <span
                                class="glyphicon glyphicon-envelope"></span>
                            ayuhotel@gmail.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 animate__animated animate__fadeInLeft">
                        <h1>Latest News</h1>
                        <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat.
                            Sed sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a
                            viverra augue ipsum et diam. Sed condimentum, libero sed cursus dapibus, libero enim feugiat
                            tellus, vitae accumsan elit neque et purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec
                            nisl placerat enim imperdiet dignissim. Maecenas sit amet nunc vel ligula tempor cursus. Sed
                            faucibus faucibus eros. Praesent pharetra wisi ut sem. Morbi dignissim pulvinar dui.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 animate__animated animate__fadeInLeft">
                        <h1>Our Services</h1>
                        <p>Magna a luctus lacinia, sem Lorem vestibulum neque ac onsectetuer Donec fermentum varius erat.
                            Sed sit amet tellus. Duis tristique, lacus vel nonummy lobortis, nibh massa dapibus diam a
                            viverra augue ipsum et diam. Sed condimentum, libero sed cursus dapibus, libero enim feugiat
                            tellus, vitae accumsan elit neque et purus. Cras aliquet consectetuer risus. Ut wisi. Etiam nec
                            nisl placerat enim imperdiet dignissim. Maecenas sit amet nunc vel ligula tempor cursus. Sed
                            faucibus faucibus eros. Praesent pharetra wisi ut sem. Morbi dignissim pulvinar dui.</p>
                    </div>
                </div>

            </section>

            @include('includes.sidebar')
        </div>

    </div>
@endsection
