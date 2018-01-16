@extends('layout.admin.master')

@section('content')

    <h2>Datum wijzigen</h2>
    <hr>

    <div class="row">

        <form method="POST" action="{{ route('dates.update', $date->id) }}">

            <input type="hidden" name="_method" value="PATCH">
            {{ csrf_field() }}
            <div class="col s12">
                <div class="input-field col s6">
                    <label for="start_date">Klik hier op een datum te selecteren</label>
                    <input type="text"  name="start_date" value="{{ $date->start_date }}" class="datepicker">
                </div>
            </div>
            <div class="col s12">
                <button class="btn waves-effect green accent-4" type="submit" name="action">Wijzigen
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

@endsection


    @section('script')

        <script>
            $(document).ready(function() {

                //datepicker start
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    today: 'Today',
                    clear: 'Clear',
                    close: 'Ok',
                    closeOnSelect: false // Close upon selecting a date,
                });

            });
        </script>

    @endsection