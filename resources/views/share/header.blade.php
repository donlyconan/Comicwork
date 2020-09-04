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

<section class="top-bar" id="home">
    <div class="container">
        <div class="level">
            <div class="level-left pc">
                <span class="logo">
                    <a href="/">Truyen QQ</a>
                </span>

                <div class="top-search">
                    <input type="text" class="text-search" placeholder="Bạn cứ nhập từ khoá...">
                    <button class="submit-btn btn_search"></button>
                    <div class="list-results">
                        <div class="title-search">Tìm kiếm gần đây</div>
                        <div class="list-container">
                        </div>
                    </div>
                </div>
            </div>

            <div class="level-right">
                <ul class="top-links pc">
                    <li>
                        <a href="/user/history">Lịch sử</a>
                    </li>
                    <li>
                        <a href="/user/follow">Theo dõi</a>
                    </li>
                    <li>
                        <a href="" class="download-app-link">
                            <span class="download-app-icon"></span>
                            Tải App
                        </a>
                    </li>
                </ul>

                @if(isset($user) && $user != null)
                    <div class="top-buttons has-login">
                        <div class="notify home smp">
                            <a href="http://truyenqq.com/index.html">
                                <i class="fas fa-home">sssssssssssssssssdad</i>
                            </a>
                        </div>

                        <div class="notify center " data-id="notification">
                            <i class="fas fa-bell"></i>
                            <div class="list-messages">
                                <div class="title-message">Thông báo</div>
                                <ul>
                                    <li class="no-result" style="padding: 10px">Không Có Thông Báo Nào!</li>
                                </ul>

                            </div>
                        </div>

                        <div class="notify center ">
                            <i class="fas fa-envelope"></i>
                            <div class="list-messages">
                                <div class="title-message">Tin nhắn</div>
                                <ul>
                                    <li class="no-result" style="padding: 10px">Không Có Tin Nhắn Nào!</li>
                                </ul>
                            </div>
                        </div>
                        <div class="notify center btn-search smp" for="focus-input"><i class="fas fa-search"></i></div>

                        <div class="notify user center">
                            <span class="avatar-menu">
                                <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png">
                            </span>
                            <div class="notify btn-user smp"><i class="fas fa-user-circle"></i></div>
                            <ul class="user-links">
                                <li>
                                    <a href="user"><i
                                            class="fas fa-user-circle"></i>Quản lý tài khoản</a>
                                </li>
                                <li>
                                    <a href="http://truyenqq.com/truyen-dang-theo-doi.html"><i class="fas fa-heart"></i>
                                        Truyện đang theo dõi</a>
                                </li>
                                <li>
                                    <a href="http://truyenqq.com/lich-su.html"><i class="fas fa-history"></i> Lịch sử
                                        đọc truyện</a>
                                </li>

                                <li>
                                    <a href="http://truyenqq.com/tin-nhan.html"><i class="fas fa-envelope"></i> Tin nhắn</a>
                                </li>
                                <li>
                                    <a href="http://truyenqq.com/doi-mat-khau.html"><i class="fas fa-lock"></i> Đổi mật
                                        khẩu</a>
                                </li>
                                <li>
                                    <a href="http://truyenqq.com/logout.html?url=http://truyenqq.com/index.html"><i
                                            class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                                </li>
                            </ul>
                        </div>


                        <div class="head_menu smp"><span>&nbsp;</span></div>
                    </div>

                @else
                    <div id="userinfo" class="top-buttons has-login">
                        <button onclick="window.location.href = '/login'" id="btn_login" class="login-btn">Đăng
                            nhập
                        </button>
                        <button onclick="window.location.href = '/register'" id="btn_register"
                                class="register-btn">Đăng ký
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
<!-- /.top-bar -->

<section class="main-menu">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="top-search smp">
                        <input class="text-search" type="text" placeholder="Bạn cứ nhập từ khoá, còn lại để qq lo">
                        <button class="submit-btn btn_search"></button>
                        <div class="list-results">
                        </div>
                    </div>
                    <a href="/" class="navbar-item">Trang Chủ</a>
                    <div class="navbar-item has-dropdown is-hoverable is-mega">
                        <div class="navbar-link">Thể loại</div>
                        <div class="navbar-dropdown ">
                            <div class="container">
                                <div class="level">
                                    <div class="level-left mega-list-wrapper">
                                        <div class="columns">
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/action-26.html">Action</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/adult-68.html">Adult</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/anime-62.html">Anime</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/chuyen-sinh-91.html">Chuyển
                                                            Sinh</a></li>
                                                    <li><a href="http://truyenqq.com/the-loai/co-dai-90.html">Cổ
                                                            Đại</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/comic-60.html">Comic</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/demons-99.html">Demons</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/detective-100.html">Detective</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/doujinshi-96.html">Doujinshi</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/drama-29.html">Drama</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/dam-my-93.html">Đam
                                                            Mỹ</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/ecchi-50.html">Ecchi</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/gender-bender-45.html">Gender
                                                            Bender</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/harem-47.html">Harem</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/historical-51.html">Historical</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/horror-44.html">Horror</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/huyen-huyen-468.html">Huyền
                                                            Huyễn</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/isekai-85.html">Isekai</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/josei-54.html">Josei</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/mafia-69.html">Mafia</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/magic-58.html">Magic</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/manhua-35.html">Manhua</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/manhwa-49.html">Manhwa</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                                            Arts</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/mature-48.html">Mature</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/the-loai/military-101.html">Military</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/ngon-tinh-87.html">Ngôn
                                                            Tình</a></li>
                                                    <li><a href="http://truyenqq.com/the-loai/one-shot-95.html">One
                                                            shot</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/romance-36.html">Romance</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/school-life-37.html">School
                                                            Life</a></li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-fi</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/seinen-42.html">Seinen</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/shoujo-38.html">Shoujo</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/shoujo-ai-98.html">Shoujo
                                                            Ai</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/shounen-31.html">Shounen</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/shounen-ai-86.html">Shounen
                                                            Ai</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice
                                                            of life</a></li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/the-loai/smut-97.html">Smut</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/sports-57.html">Sports</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a>
                                                    </li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/trong-sinh-82.html">Trọng
                                                            Sinh</a></li>
                                                    <li><a href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện
                                                            Màu</a></li>
                                                    <li>
                                                        <a href="http://truyenqq.com/the-loai/webtoon-55.html">Webtoon</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/the-loai/xuyen-khong-88.html">Xuyên
                                                            Không</a></li>
                                                    <li><a href="http://truyenqq.com/the-loai/yaoi-70.html">Yaoi</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/the-loai/yuri-75.html">Yuri</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right pc">
                                        <img src="http://static.truyenqq.com/template/frontend/images/menu-icon.jpg"
                                             class="mega-menu-cover" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="navbar-item has-dropdown is-hoverable is-mega">--}}
                    {{--                        <div class="navbar-link">Quốc gia</div>--}}
                    {{--                        <div class="navbar-dropdown ">--}}
                    {{--                            <div class="container">--}}
                    {{--                                <div class="level">--}}
                    {{--                                    <div class="level-left mega-list-wrapper">--}}
                    {{--                                        <div class="columns">--}}
                    {{--                                            <div class="column">--}}
                    {{--                                                <ul class="mega-list">--}}
                    {{--                                                    <li><a href="http://truyenqq.com/top-ngay.html">Top Ngày</a>--}}
                    {{--                                                    </li>--}}
                    {{--                                                    <li><a href="http://truyenqq.com/top-tuan.html">Top Tuần</a>--}}
                    {{--                                                    </li>--}}
                    {{--                                                </ul>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="column">--}}
                    {{--                                                <ul class="mega-list">--}}
                    {{--                                                    <li><a href="http://truyenqq.com/top-thang.html">Top Tháng</a>--}}
                    {{--                                                    </li>--}}
                    {{--                                                    <li><a href="http://truyenqq.com/truyen-yeu-thich.html">Yêu--}}
                    {{--                                                            Thích</a></li>--}}
                    {{--                                                </ul>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="column">--}}
                    {{--                                                <ul class="mega-list">--}}
                    {{--                                                    <li><a href="http://truyenqq.com/truyen-moi-cap-nhat.html">Mới--}}
                    {{--                                                            Cập Nhật</a></li>--}}
                    {{--                                                    <li><a href="http://truyenqq.com/truyen-tranh-moi.html">Truyện--}}
                    {{--                                                            Mới</a></li>--}}
                    {{--                                                </ul>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="column">--}}
                    {{--                                                <ul class="mega-list">--}}
                    {{--                                                    <li><a href="http://truyenqq.com/truyen-hoan-thanh.html">Truyện--}}
                    {{--                                                            Full</a></li>--}}
                    {{--                                                </ul>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="navbar-item has-dropdown is-hoverable is-mega">
                        <div class="navbar-link">Sắp xếp</div>
                        <div class="navbar-dropdown ">
                            <div class="container">
                                <div class="level">
                                    <div class="level-left mega-list-wrapper">
                                        <div class="columns">

                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/top-ngay.html">Top Ngày</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/top-tuan.html">Top Tuần</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/top-thang.html">Top Tháng</a>
                                                    </li>
                                                    <li><a href="http://truyenqq.com/truyen-yeu-thich.html">Yêu
                                                            Thích</a></li>
                                                </ul>
                                            </div>
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/truyen-moi-cap-nhat.html">Mới
                                                            Cập Nhật</a></li>
                                                    <li><a href="http://truyenqq.com/truyen-tranh-moi.html">Truyện
                                                            Mới</a></li>
                                                </ul>
                                            </div>
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="http://truyenqq.com/truyen-hoan-thanh.html">Truyện
                                                            Full</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="http://truyenqq.com/truyen-con-gai.html" class="navbar-item">Truyện Con Gái</a>
                    <a href="http://truyenqq.com/truyen-con-trai.html" class="navbar-item">Truyện Con Trai</a>
                    <a rel="nofollow" href="http://truyenqq.com/lich-su.html" class="navbar-item">Lịch Sử</a>
                    <a rel="nofollow" href="http://truyenqq.com/truyen-dang-theo-doi.html" class="navbar-item">Theo
                        Dõi</a>
                    <a rel="nofollow" href="https://www.facebook.com/groups/438911163131883" target="_blank"
                       class="navbar-item">Thảo Luận</a>
                    <a rel="nofollow" href="https://www.facebook.com/truyenqq.page" target="_blank"
                       class="navbar-item">Fanpage</a>
                    <a rel="nofollow" href="https://truyenqq.com/tin-tuc/tuyen-nhan-su.html" target="_blank"
                       class="navbar-item">Tuyển Nhân Sự</a>

                </div>
            </div>
        </nav>
    </div>


</section>
<!-- /.main-menu -->
