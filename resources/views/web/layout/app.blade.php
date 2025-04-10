<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure-Dental</title>

    <link type="image/x-icon" href="{{asset('theme/img/favicon.png')}}" rel="icon">

    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
</head>
<body>
<div class="main-wrapper">
    <header class="header home">
        @include('web.include.navbar')
        @include('web.include.header')
    </header>

        @yield('section')

        @include('web.include.footer')
</div>
<script src="{{asset('theme/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('theme/js/slick.js')}}"></script>

<script src="{{asset('theme/js/script.js')}}"></script>
</body>

</html>
