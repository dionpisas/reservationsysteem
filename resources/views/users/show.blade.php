@extends('layout.admin.master')



@section('content')


    <div class="col s8" id="headers">
        <h1 class="center -align z-depth-2">Gebruikers info</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col s12">
            <div class="col s8">
                <p>Gebruikersnaam : {{$user->name}}</p>
                <p>Gebruikers e-mail : {{$user->email}}</p>
                <p>Gebruikers wachtwoord: ********************</p>
                <p>Gebruikers Role: {{$user->role->name }}</p>
            </div>

            <div class="col s4">
                <a href="{{ route('users.edit', $user->id) }}" class="waves-effect orange accent-3 btn"><i class="material-icons right">edit</i>Wijzigen</a>
                <a href="#modal" class="waves-effect red accent-4 btn btn modal-trigger"><i class="material-icons right">delete</i>verwijderen</a>
            </div>
        </div>
    </div>


@endsection

@include('users.modal')

@section('script')
    <script>
        $(document).ready(function(){
            // start modal
            $('.modal').modal();

            // alter fade out
            $("#alert").fadeOut(10000);
        });
    </script>
@endsection
