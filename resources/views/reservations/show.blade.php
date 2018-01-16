@extends('layout.user.master')



@section('content')

    <h2>Afspraak info</h2>
    <hr>

    <div class="row">
        <div class="col s12">
            <div class="col s8">
                <?php $originalDate = $appointment->date;
                $newDate = date("d-F-Y", strtotime($originalDate)) ?>
                <p>Afspraak Datum: {{$newDate}}</p>
                <p>Afspraak Status:@if($appointment->statuses_id == 2) Gereserveerd door U @else {{$appointment->status->name }} @endif </p>
                <p>Afspraak Tijdstip: {{$appointment->start_time}} tot {{$appointment->end_time}} </p>
            </div>

            <div class="col s4">
                @if($appointment->statuses_id == 1)
                    <a href="#modal" class="waves-effect blue accent-4 btn btn modal-trigger"><i class="material-icons right">check</i>Reserveren</a>
                    @else
                    <a href="#modal" class="waves-effect orange accent-4 btn btn modal-trigger"><i class="material-icons right">cancel</i>Reservering annuleren</a>
                    @endif

            </div>
        </div>
    </div>


@endsection

@include('reservations.modal')

@section('script')
    <script>
        $(document).ready(function(){
            // start modal
            $('#modal').modal();

            // alert and error fade out
            $("#alert").fadeOut(10000);
            $("#error").fadeOut(10000);
        });
    </script>
@endsection
