<nav>
    <div class="nav-wrapper" id="sidenav">
        <a href="#" class="brand-logo">RoseNails</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">


            @if(Auth::check() && Auth::user()->isAdmin())

                <li><a class='dropdown-button btn red light' data-activates='dropdown1'>Admin</a></li>

                @include('layout.admin.dropdown')

                @elseif(Auth::check())

                {{--<li><a href="{{route('appointments.index')}}">Beschikbare afspraken</a></li>--}}
                {{--<li><a href="{{route('reservations.index')}}">Gerserveerde afspraken</a></li>--}}

                @endif
                <li><a href="{{route('logout')}}"
                       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Log out</a>
                </li>

        </ul>


        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
            {{csrf_field()}}
        </form>
    </div>
</nav>