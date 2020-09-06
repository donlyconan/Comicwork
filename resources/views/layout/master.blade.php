<html>
<head>
    <meta charset="utf-8">
    <title>Truyện tranh online</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=6.0, user-scalable=yes">
    <link rel="shortcut icon" href="http://static.truyenqq.com/template/frontend/images/favicon.ico?v=1.1"
          type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="http://static.truyenqq.com/template/frontend/styles/styles.css?v=4.1">
    <link rel="stylesheet" type="text/css" href="http://static.truyenqq.com/template/frontend/styles/read.css?v=1.0">
    <script src="http://static.truyenqq.com/template/frontend/scripts/main.js?v=4.4"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
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
                    <a itemprop="url" href="//truyenqq.com">
                        <img itemprop="logo" src="//static.truyenqq.com/template/frontend/images/logo.png"
                             alt="Truyện tranh Online">
                    </a>
                </div>
            </div>
            <div class="level-right">
                <ul class="social-links">
                    <li><a href="https://itunes.apple.com/us/app/truyenqq/id1282215661?ls=1&amp;mt=8"><span
                                class="app-store-icon"></span></a></li>
                    <li><a href="https://play.google.com/store/apps/details?id=com.truyenqq.truyen"><span
                                class="google-play-icon"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

</html>
