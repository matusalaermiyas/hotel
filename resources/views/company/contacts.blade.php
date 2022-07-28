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
                        <section data-aos="fade-up" data-aos-duration="1000">
                            <h1>Latest News</h1>
                            <p>
                                The current pandemic situation forces us all to look for non-standard solutions. Especially
                                working
                                people, who currently perform their duties remotely from home, need appropriate conditions
                                to work as
                                efficiently as in the office. Unfortunately, at home, it is often difficult to
                                implement. Facing these
                                difficulties, the Grand Royal Hotel has prepared a unique offer for you to use our hotel
                                rooms as a
                                remote office. Read today's article and find out why you should use our package.

                                Remote work from home is not a problem for some. However, many people are not used to it,
                                especially
                                when their home does not provide them with the necessary conditions for full
                                concentration. The presence
                                of other household members, including children, effectively distracts us from our duties and
                                makes us
                                less effective. If you are struggling with this problem and you cannot fully focus on work,
                                while
                                staying at home, get to know the attractive offer of the Ayu International Hotel.

                            </p>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 animate__animated animate__fadeInLeft">
                        <section data-aos="fade-up" data-aos-duration="1000">
                            <h1>Our services</h1>
                            <section>
                                <h2 style="font-size: 20px">Restaurant</h2>
                                <p>Ayu International Hotel bar and restaurant offers variety of drinks and delicious food.
                                    This hotel
                                    in Adama ensures that guests get quality services. This hotel in Adama offers both local
                                    and
                                    international cuisine at their deluxe restaurants. The comfortable bar will provide you
                                    with
                                    comfortable environment to relax and enjoy with friends.
                                </p>
                            </section>

                            <section>
                                <h2 style="font-size: 20px">Meeting and Event</h2>

                                <p>The rich offer of our hotel perfectly meets the expectations of entrepreneurs looking for
                                    a
                                    professional and well-equipped room for a company event, conference or
                                    training. Convenient
                                    location, spacious rooms with full equipment and qualified staff make the Ayu Int Hotel
                                    the perfect
                                    hotel for the Conference and Meetings</p>


                                <p>
                                    We have three multi-functional rooms of different sizes - the largest of them is able to
                                    easily
                                    accommodate up to 300 people. We offer modern conference rooms with rich equipment and
                                    advanced
                                    audiovisual equipment, which allows for a fully professional conduct of each
                                    presentation. The rooms
                                    are
                                    located on the ground floor, ensuring convenient organization of any company meetings,
                                    conferences
                                    or
                                    training sessions.
                                </p>

                            </section>
                        </section>
                    </div>
                </div>

            </section>

            @include('includes.sidebar')
        </div>

    </div>
@endsection
