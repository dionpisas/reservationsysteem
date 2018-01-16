@extends('layout.admin.master')

@section('content')



    <h2>Afspraak aanpassen</h2>
    <hr>

    <div class="row">
        <form  method="POST" class="col s12" action="{{route('appointment.update', $appointment->id)}}">

            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">

            <div class="input-field col s12">
                <label for="start_date">Klik hier op een datum te selecteren</label>
                <input type="text"  name="date" value="{{$appointment->date}}" id="date" class="datepicker" required>
            </div>

            <hr>
            <br>
            <div class="input-field col s6">
                <label for="start_time">Klik hier om een start tijdstip te selecteren</label>
                <input type="text"  name="start_time" value="{{$appointment->start_time}}"  id="start_time" class="timepicker" required>
            </div>


            <div class="input-field col s6">
                <label for="end_time">Klik hier om een eind tijdstip te selecteren</label>
                <input type="text"  name="end_time" value="{{$appointment->end_time}}"  id="end_time" class="timepicker">
            </div>

            <hr>


            <div class="row">
                <div class="input-field col s8">
                    <select name="user_id">
                        <option value="" disabled selected>Selecteer een gebruiker voor de afspraak Optioneel</option>
                        <option value="" @if($appointment->user_id == NULL) selected @endif >Geen keuze</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @if($appointment->user_id == $user->id)selected @elseif($appointment->user_id == NULL)  @endif >{{$user->name}}</option>
                        @endforeach
                    </select>
                    <label>Optioneel gebruiker selecteren</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s8">
                    <select name="statuses_id">
                        <option value="" disabled selected>Selecteer een status voor de afspraak</option>
                        @foreach($status as $stat)
                            <option value="{{$stat->id}}"@if($appointment->statuses_id == $stat->id)selected @endif >{{$stat->name}}</option>
                        @endforeach
                    </select>
                    <label>Afspraak status selecteren</label>
                </div>
            </div>



            <div class="row">
                <div class="input-field col s6">
                    <button class="btn waves-effect green accent-4" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>

        </form>

        @include('layout.error')

    </div>
@endsection



@section('script')
    <script>

        $(document).ready(function() {

            //Select start
            $('select').material_select();

            //datepicker start
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 1, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: true // Close upon selecting a date,
            });

            // alert fade out
            $("#alert").fadeOut(10000);
            $("#error").fadeOut(10000);

            //start timepicker
            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Clear', // text for clear-button
                canceltext: 'Cancel', // Text for cancel-button
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });


        });

    </script>
@endsection
