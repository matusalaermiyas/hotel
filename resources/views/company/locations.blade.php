@extends('layouts.master')

@section('title', 'Ayu Hotel | Locations')



<style>
    .card {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 7px;
        overflow: hidden;
        padding: 0;
        width: max-content
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <section class="col-sm-8">
                <h1>Locations</h1>
                <p>Here is a full map of Adama city, and you can move to any direction of the city through the map and you
                    can see your distance from our hotel.</p>

                <div data-aos="fade-up" data-aos-duration="1000" class="animate__animated animate__fadeInLeft">
                    <h2>Satellite View</h2>
                    <div class="card">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=ayu%20hotel%20adama&t=k&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://123movies-to.org"></a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 500px;
                                        width: 600px;
                                    }
                                </style><a href="https://www.embedgooglemap.net">add google maps to website</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 500px;
                                        width: 600px;
                                    }
                                </style>
                            </div>
                        </div>

                    </div>
                </div>

                <div data-aos="fade-up" data-aos-duration="1000">
                    <h2>GPS View</>
                        <div class="card">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=ayu%20hotel%20adama&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                        href="https://123movies-to.org"></a><br>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 500px;
                                            width: 600px;
                                        }
                                    </style><a href="https://www.embedgooglemap.net">add google maps to website</a>
                                    <style>
                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 500px;
                                            width: 600px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                </div>
            </section>

            @include('includes.sidebar')
        </div>

    </div>
@endsection
