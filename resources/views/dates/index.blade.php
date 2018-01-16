@extends('layout.admin.master')

@section('content')

    <h2 class="truncate">Datums dat u beschikbaar heeft gemaakt voor Afspraken</h2>
    <hr>

    @if(empty($date))

        <h1>Geen datums beschikbaar</h1>

        @else

        <div class="row">
            <div class="col s12">
                @foreach($date as $dat)
                    <div class="col s4">
                        <?php $new = date("d/m/Y", strtotime($dat->start_date)); ?>
                        {{ $new }}
                    </div>
                    <div class="col s8">
                        <a  disabled class="waves-effect blue accent-3 btn"><i class="material-icons right">open</i>Bekijken</a>
                        <a href="{{ route('dates.edit', $dat->id) }}" class="waves-effect orange accent-3 btn"><i class="material-icons right">edit</i>Wijzigen</a>
                        <a href="{{ route('dates.destroy', $dat->id) }}"class="waves-effect red accent-4 btn"><i class="material-icons right">delete</i>verwijderen</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


@endsection

