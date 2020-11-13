<html>
<head>
    <meta charset="utf-8">
    @section('title-page')
        Truyện tranh online
    @endsection

    <title>@yield('title-page')</title>

    @auth
        <meta id="token" name="token" content="{{request()->cookie('access-token')}}">
    @endauth

    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
    <link rel="shortcut icon" href="http://static.truyenqq.com/template/frontend/images/favicon.ico?v=1.1"
          type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://static.truyenqq.com/template/frontend/styles/styles.css?v=4.1">
    <link rel="stylesheet" type="text/css" href="http://static.truyenqq.com/template/frontend/styles/read.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/main.css')}}">
    <script src="{{ asset('home/js/main.js') }}"></script>
</head>
<body>

<section class="top-bar" id="home">
    @include('include.top-bar')
</section>

<section class="main-menu">
    @include('include.menu-bar')
</section>

<section>
    @yield('nominations')
</section>

<section>
    @yield('body-page')
</section>

</body>

<section class="footer">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <div class="col-sm-4 text-center" itemscope="" itemtype="http://schema.org/Organization">
                </div>
            </div>
            <div class="level-right">
                <ul class="social-links">
                    <li><a href=""><span class="app-store-icon"></span></a></li>
                    <li><a href=""><span class="google-play-icon"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

</html>
