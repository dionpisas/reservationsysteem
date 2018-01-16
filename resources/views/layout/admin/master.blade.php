    <!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/vendor.css')}}"  media="screen,projection"/>
    <!-- Css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RoseNails') }}</title>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Reserveringsysteem">
    <meta name="author" content="Dion Pisas">
</head>

<body>
@include('layout.admin.nav')

@include('layout.alert')


<div class="container">
    @yield('content')
</div>

<div id="app">

</div>

<br>
<br>
@include('layout.admin.footer')
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
