@extends('layout.admin.master')

@section('content')

    <div class="col s8" id="headers">
        <h1 class="center -align z-depth-2">Nieuwe gebruiker aanmaken</h1>
    </div>
    <hr>

    <div class="row">
        <form  method="POST"  action="{{route('users.store')}}">

            {{ csrf_field() }}

            <div class="input-field col s12">
                <input type="text"  name="name" value="" id="name">
                <label for="name">Naam</label>
            </div>
            <br>

            <div class="input-field col s12">
                <input type="email"  name="email" value="" id="email">
                <label for="name">Email</label>
            </div>
            <br>


                <div class="input-field col s6">
                    <input id="password" type="password" name="password" class="validate">
                    <label for="password">Wachtwoord</label>
                </div>

                <div class="input-field col s6">
                    <input id="password_confirmation" type="password"  name="password_confirmation" class="validate">
                    <label for="password_confirmation">Wachtwoord herhalen</label>
                </div>

                <div class="input-field col s6">
                    <button class="btn waves-effect green accent-4" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>


        </form>

    </div>
    @include('layout.error')
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