<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','HOME')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('/css') }}/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/barfiller.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/nowfont.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/rockville.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css') }}/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
          @include('layouts.user_nav')
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->


    <!-- Countdown Section Begin -->
    @yield('konten')
    <!-- Countdown Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.user_footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('/js') }}/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('/js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('/js') }}/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/js') }}/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('/js') }}/jquery.barfiller.js"></script>
    <script src="{{ asset('/js') }}/jquery.countdown.min.js"></script>
    <script src="{{ asset('/js') }}/jquery.slicknav.js"></script>
    <script src="{{ asset('/js') }}/owl.carousel.min.js"></script>
    <script src="{{ asset('/js') }}/main.js"></script>

    <!-- Music Plugin -->
    <script src="{{ asset('/js') }}/jquery.jplayer.min.js"></script>
    <script src="{{ asset('/js') }}/jplayerInit.js"></script>
</body>

</html>
