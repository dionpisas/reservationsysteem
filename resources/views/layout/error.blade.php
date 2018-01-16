@if(count($errors))

    <div class="alert card-panel red lighten-2" id="error">

        <ul>
            @foreach($errors->all() as $error)

                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>

    </div>
@endif
