<!-- Modal Structure -->
<div id="modal" class="modal">
    <div class="modal-content">
        <h4>{{$header}}</h4>
        <p>{{$text}}</p>
    </div>
    <div class="modal-footer">
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">

            <a href="" class="modal-action modal-close waves-effect waves-red btn-flat" >Annuleren</a>
            <button class="btn waves-effect red accent-4" type="submit" name="action">Verwijderen
                <i class="material-icons right">delete</i>
            </button>

        </form>
    </div>
</div>