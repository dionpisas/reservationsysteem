@extends('layout.admin.master')


@section('content')

    <h2 class="truncate">Tijden dat u beschikbaar heeft gemaakt voor afspraken</h2>
    <hr>

    @if(empty($times))

        <h1>Geen Tijden beschikbaar</h1>

    @else

        <div class="row">
            <div class="col s12">
                @foreach($times as $time)
                    <div class="col s4">

                  Start-tijd:{{ $time->start_time }}   Eind-tijd: {{$time->end_time}}

                    </div>
                    <div class="col s8">
                        <a disabled class="waves-effect blue accent-3 btn"><i class="material-icons right">open</i>Bekijken</a>
                        <a href="{{ route('times.edit', $time->id) }}" class="waves-effect orange accent-3 btn"><i class="material-icons right">edit</i>Wijzigen</a>
                        <a href="{{ route('times.destroy', $time->id) }}"class="waves-effect red accent-4 btn"><i class="material-icons right">delete</i>verwijderen</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


@endsection


