@extends('layout.admin.master')



@section('content')

<h2>Afspraak info</h2>
<hr>

<div class="row">
    <div class="col s12">
        <div class="col s8">
            <p>Afspraak nummer: {{$appointment->id}}</p>
            <p>Afspraak gekoppeld aan: @if(!$appointment->user_id) geen gebruiker gekoppeld. @else {{$appointment->user->name}} @endif</p>
            <p>Afspraak Datum: {{$appointment->date}}</p>
            <p>Afspraak Status: {{$appointment->status->name }}</p>
            <p>Afspraak Tijdstip: {{$appointment->start_time}} tot {{$appointment->end_time}} </p>
        </div>

        <div class="col s4">
            <a href="{{ route('appointment.edit', $appointment->id) }}" class="waves-effect orange accent-3 btn"><i class="material-icons right">edit</i>Wijzigen</a>
            <a href="#modal" class="waves-effect red accent-4 btn btn modal-trigger"><i class="material-icons right">delete</i>verwijderen</a>
        </div>
    </div>
</div>


@endsection

@include('appointments.modal')

@section('script')
    <script>
        $(document).ready(function(){
            // start modal
            $('.modal').modal();

            // alert and error fade out
            $("#alert").fadeOut(10000);
            $("#error").fadeOut(10000);
        });
    </script>
@endsection
