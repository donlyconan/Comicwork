@php
    $notifies = \App\Render\NotificationRender::share();
@endphp

<div class="container">
    <div class="level">
        <div class="level-left pc">
                <span class="logo">
                    <a href="{{route('homepage')}}">Truyện Tranh</a>
                </span>

            <form class="top-search" style="margin-top: auto; margin-bottom: auto;" action="{{route('home.search')}}"
                  method="get">
                <input name="q" id="txtSearch" type="text" class="txt-search"
                       placeholder="Nhập nội dung tìm kiếm...">
                <button type="submit" class="submit-btn btn_search"></button>
                <div class="list-results">
                    <div class="title-search">Tìm kiếm gần đây</div>
                    <div class="list-container">
                    </div>
                </div>
            </form>
        </div>

        <div class="level-right">
            <ul class="top-links pc">
                <li>
                    <a href="{{route('user.history')}}">Lịch sử</a>
                </li>
                <li>
                    <a href="{{route('user.follow')}}">Theo dõi</a>
                </li>
                <li>
                    <a href="" class="download-app-link">
                        <span class="download-app-icon"></span>
                        Tải App
                    </a>
                </li>
            </ul>

            @if(Auth::check())
                <div class="top-buttons has-login">
                    <div class="notify home smp">
                        <a href="http://truyenqq.com/index.html">
                            <i class="fas fa-home"></i>
                        </a>
                    </div>

                    <div class="notify center notify-left">
                        <i class="fas fa-bell">
                            <span class="top-number" {{$notifies->total > 0 ?: 'hidden'}}>{{$notifies->total}}</span>
                        </i>
                        <div class="list-messages">
                            <div class="title-message">Thông báo</div>
                            <ul class="list-notify">
                                @forelse($notifies as $notify)
                                    @includeIf('include.item-notify', compact('notify'))
                                @empty
                                    <li class="no-result" style="padding: 10px">Không Có Thông Báo Nào!</li>
                                @endforelse
                            </ul>
                            <div data-user="{{Auth::id()}}" data-from="{{count($notifies)}}" class="load-more load_more_notification">
                                <a class="is-info">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <div class="notify center">
                        <i class="fas fa-envelope"></i>
                        <div class="list-messages">
                            <div class="title-message">Tin nhắn</div>
                            <ul>
                                <li class="no-result" style="padding: 10px">Không Có Tin Nhắn Nào!</li>
                            </ul>
                        </div>
                    </div>

                    <div class="notify center btn-search smp" for="focus-input">
                        <i class="fas fa-search"></i></div>

                    <div class="notify user center">

                        @section("user-avatar")
                            <img style="border: #7f8c8d 1px solid;" src="{{Auth::user()->profile()}}">
                        @endsection

                        <span class="avatar-menu">
                            @yield("user-avatar")
                        </span>
                        <div class="notify btn-user smp"><i class="fas fa-user-circle"></i></div>
                        <ul class="user-links">
                            <li>
                                <a href="{{route("user.info")}}">
                                    <i class="fas fa-user-circle"></i>Quản lý tài khoản
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.follow')}}"><i class="fas fa-heart"></i>
                                    Truyện đang theo dõi</a>
                            </li>
                            <li>
                                <a href="{{route('user.history')}}"><i class="fas fa-history"></i> Lịch sử
                                    đọc truyện</a>
                            </li>

                            <li>
                                <a href="{{route('user.account')}}"><i class="fas fa-lock"></i> Đổi mật
                                    khẩu</a>
                            </li>
                            <li>
                                <a href="{{route('user.logout')}}"><i
                                        class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </div>


                    <div class="head_menu smp"><span>&nbsp;</span></div>
                </div>
            @else
                <div id="userinfo" class="top-buttons has-login">
                    <button onclick="location.href = '{{route('login')}}'" id="btn_login" class="login-btn">Đăng
                        nhập
                    </button>
                    <button onclick="location.href = '{{route('register')}}'" id="btn_register"
                            class="register-btn">Đăng ký
                    </button>
                </div>
            @endif

        </div>
    </div>
</div>
