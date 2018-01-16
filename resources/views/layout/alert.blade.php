@if($flash = session('message'))

   <div class="container">
       <div  class="alert card-panel grey lighten-2" role="alert" id="alert">
           {{ $flash }}
       </div>
   </div>
@endif