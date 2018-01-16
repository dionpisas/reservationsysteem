@extends('layout.admin.master')



@section('content')


    <h2> Gebruiker aanpassen</h2>
    <hr>

    <div class="row">
        <form  method="POST"  action="{{ route('users.update', $user->id) }}">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">

            <div class="input-field col s12">
                <input type="text"  name="name" value="{{$user->name}}" id="name">
                <label for="name">Naam</label>
            </div>
            <br>

            <div class="input-field col s12">
                <input type="email"  name="email" value="{{$user->email}}" id="email">
                <label for="name">Email</label>
            </div>
            <br>

            <div class="row col s12">
                <div class="input-field col s6">
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Wachtwoord</label>
                </div>

                <div class="input-field col s6">
                    <input id="password_confirmation" type="password"  name="password_confirmation" class="validate">
                    <label for="password_confirmation">Wachtwoord herhalen</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s8">
                    <select name="roles_id">
                        <option value="" disabled selected>Selecteer een role voor de gebruiker</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" @if($user->roles_id == $role->id)  selected @endif >{{$role->name}}</option>
                        @endforeach
                    </select>
                    <label>Gebruikers role selecteren</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <button class="btn waves-effect green accent-4" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>

            @include('layout.error')
        </form>


        @endsection
        @section('script')
            <script>
                $(document).ready(function() {

                    // alert and error fadeout
                    $("#alert").fadeOut(10000);
                    $("#error").fadeOut(10000);

                    //start select
                    $('select').material_select();
                });
            </script>
@endsection