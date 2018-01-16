<!-- Modal Structure -->
<div id="modal" class="modal">
    <div class="modal-content">
        <h4>{{$header}}</h4>
        <p>{{$text}}</p>
        <h5>{{$warning}}</h5>
    </div>
    <div class="modal-footer">
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" >
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">

            <a href="" class="modal-action modal-close waves-effect waves-red btn-flat" >Annuleren</a>
            @if($appointment->statuses_id == 1)
                <button class="btn waves-effect green accent-4" type="submit" name="action">Reserveren
                    <i class="material-icons right">send</i>
                </button>
                @else
                <button class="btn waves-effect red accent-4" type="submit" name="action">Reservering annuleren
                    <i class="material-icons right">send</i>
                </button>
                @endif


        </form>
    </div>
</div>