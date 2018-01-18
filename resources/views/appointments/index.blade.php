@extends('layout.admin.master')



@section('content')


    <div class="col s8" id="headers">
        <h1 class="center -align z-depth-2">Alle afspraken</h1>
    </div>
    <hr>

    @if(empty($appointment))

        <h1>Geen datums beschikbaar</h1>

    @else

        <div class="row">
            <div class="col s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Afspraken</h4></li>
                    @foreach($appointment as $app)
                        <li class="collection-item"><div>{{$app->id}}<a href="{{ route('appointment.show', $app->id) }}" class="secondary-content">Om te bekijken klik hier<i class="material-icons"></i></a></div></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            // alert and error fade out
            $("#alert").fadeOut(10000);
            $("#error").fadeOut(10000);
        });
    </script>

@endsection