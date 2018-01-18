@extends('layout.admin.master')



@section('content')


    <div class="col s8" id="headers">
        <h1 class="center -align z-depth-2">Alle gebruikers</h1>
    </div>
    <hr>

    @if(empty($users))

        <h1>Geen gebruikers op het moment</h1>

    @else

        <div class="row">
            <div class="col s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Gebruikers</h4></li>
                @foreach($users as $user)
                        <li class="collection-item"><div>Gebruikersnaam : {{$user->name}}<a href="{{ route('users.show', $user->id) }}" class="secondary-content">Om te bekijken klik hier<i class="material-icons"></i></a></div></li>
                @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(empty($admin))

        <h1>Geen administrators op het moment</h1>

    @else

        <div class="row">
            <div class="col s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Administrators</h4></li>
                    @foreach($admin as $adm)
                        <li class="collection-item"><div>Gebruikersnaam : {{$adm->name}}<a href="{{ route('users.show', $adm->id) }}" class="secondary-content">Om te bekijken klik hier<i class="material-icons"></i></a></div></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // alter fade out
            $("#alert").fadeOut(10000);
        });
    </script>

@endsection