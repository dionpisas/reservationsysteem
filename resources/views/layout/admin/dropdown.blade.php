
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="{{route('appointment.index')}}"> Afspraken</a></li>
    <li><a href="{{route('appointment.create')}}"> Afspraken maken</a></li>
    <li class="divider"></li>
    <li><a href="{{route('users.index')}}"> Geberuikers</a></li>
    <li><a href="{{route('users.create')}}"> Geberuikers aanmaken</a></li>
    <li class="divider"></li>
    <li><a href="{{route('logout')}}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Log out</a>
    </li>
</ul>