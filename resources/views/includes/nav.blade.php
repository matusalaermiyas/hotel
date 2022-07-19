<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Ayu Int Hotel</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav pull-right">



            @if (!Session::has('logged'))
                <li><a href="{{ route('auth.signin') }}">Login</a></li>
            @else
                @if (Session::get('role') == 'casher')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">{{ Session::get('username') }}
                            <b class="caret"></b>
                        </a>
                        @include('includes.roles.casher')
                    </li>
                @endif

                @if (Session::get('role') == 'manager')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">{{ Session::get('username') }}

                            <b class="caret"></b>
                        </a>
                        @include('includes.roles.manager')
                    </li>
                @endif

                @if (Session::get('role') == 'reception')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">{{ Session::get('username') }}

                            <b class="caret"></b>
                        </a>
                        @include('includes.roles.reception')
                    </li>
                @endif

                @if (Session::get('role') == 'system_admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">{{ Session::get('username') }}
                            <b class="caret"></b>

                        </a>
                        @include('includes.roles.system_admin')
                    </li>
                @endif

                @if (Session::get('role') == 'customer')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                            data-toggle="dropdown">{{ Session::get('username') }}
                            <b class="caret"></b>

                        </a>
                        @include('includes.roles.customer')
                    </li>
                @endif
            @endif

            <li><a href="{{ route('about') }}">About our Hotel</a></li>
            <li><a href="{{ route('rooms') }}">Rooms</a></li>
            <li><a href="{{ route('gallery') }}">Photogallery</a></li>
            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
            <li><a href="{{ route('locations') }}">Locations</a></li>
            <li><a href="{{ route('contacts') }}">Contacts</a></li>



        </ul>
    </div>
</nav>
