<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Best Foods</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="page">

<header class="page-head">   
    <a style="color: #fff; font-size:1.5em; font-weight: bold; margin-left: 20px;" class="title" href="/Home">-Best foods-</a>
      <ul class="global-nav">
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
      </ul>
</header>


<main class="page-main">
    
        <main style="margin-top: 30px;" class="py-4">
            @yield('content')
        </main>
        </div>
</main>




<footer class="page-foot">
   <small>(C)2019 ikegawa-t.</small>
</footer>

</body>
</html>
