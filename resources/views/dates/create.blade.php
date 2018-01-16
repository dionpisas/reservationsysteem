@extends('layout.admin.master')

@section('content')

    <h2>Formulier</h2>
    <hr>

    <div class="row">
        <form  method="POST" class="col s12" action="/dates">


            <div class="input-field col s6">
                <label for="start_date">Klik hier op een datum te selecteren</label>
                <input type="text"  name="start_date" value="" id="start_date" class="datepicker">
            </div>

            {{ csrf_field() }}

            {{--<div class="row">--}}
                {{--<div class="input-field col s8">--}}
                    {{--<select>--}}
                        {{--<option value="" disabled selected>Hoeveel afspraken wilt u beschikbaar maken?</option>--}}
                        {{--<option value="1">1</option>--}}
                        {{--<option disabled value="2">2</option>--}}
                        {{--<option disabled value="3">3</option>--}}
                    {{--</select>--}}
                    {{--<label>Aantal afspraken</label>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="input-field col s6">--}}
                    {{--<label for="start_time">Klik hier om een start tijdstip te selecteren</label>--}}
                    {{--<input type="text"  value="" id="start_time" name="start_time" class="timepicker">--}}
                {{--</div>--}}

                {{--<div class="input-field col s6">--}}
                    {{--<label for="end_time">Klik hier om een eind tijdstip te selecteren</label>--}}
                    {{--<input type="text"  value="" id="end_time" name="end_time" class="timepicker">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<hr>--}}

        <div class="row">
            <div class="input-field col s6">
                <button class="btn waves-effect green accent-4" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>



        </form>
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
