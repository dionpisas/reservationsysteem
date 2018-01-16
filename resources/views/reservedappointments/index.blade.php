@extends ('layout.user.master')


@section('content')

    <h2 class="center-aligned">Gereserveerde afsprakken.</h2>
    <hr>

    @if(empty($appointments))

        <h3 class="center-aligned">Geen afspraken gereserveerd.</h3>

    @else

        <div class="row">
            <div class="col s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Afspraken</h4></li>
                    @foreach($appointments as $app)
                        <?php $originalDate = $app->date;
                        $newDate = date("d-F-Y", strtotime($originalDate)) ?>
                        <li class="collection-item"><div>Afspraak datum : {{$newDate}}<a href="{{ route('appointments.show', $app->id) }}" class="secondary-content">Om te bekijken klik hier<i class="material-icons"></i></a></div></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection


@section('script')
    <script>
        $(document).ready(function(){
            // alter fade out
            $("#alert").fadeOut(10000);
        });
    </script>

@endsection