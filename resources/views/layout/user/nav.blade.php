<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">RoseNails</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            {{--<li><a href="collapsible.html">Log in</a></li>--}}
            <li><a href="{{route('appointments.index')}}">Beschikbare afspraken</a></li>
            <li><a href="{{route('reservations.index')}}">Gerserveerde afspraken</a></li>

            <li><a href="{{route('logout')}}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Log out</a>
            </li>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                {{csrf_field()}}
            </form>
        </ul>
    </div>
</nav>