@php
    $notifies = \App\Render\NotificationRender::share();
@endphp

<div class="container">
    <div class="level">
        <div class="level-left pc">
            <span class="logo-switch">
                <a href="{{route('homepage')}}">
                    <img style="width: auto; height: 55px;" class="image"
                         src="{{asset('image/logo.png')}}"/>
                </a>
            </span>
            <form class="top-search" style="margin-top: auto; margin-bottom: auto;" action="{{route('home.search')}}"
                  method="get">
                <input name="q" onfocusout="focusOut()" id="txtSearch" type="text" class="txt-search"
                       placeholder="Nhập nội dung tìm kiếm...">
                <button type="submit" class="submit-btn btn_search"></button>
                <div class="list-results">
                    <div class="list-container">
                    </div>
                </div>

                <script>
                    function focusOut() {
                        var list = document.getElementsByClassName('list-results')[0];
                        list.className = 'list-results';
                    }
                </script>
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
                    <div class="notify center">
                        <i class="fas fa-bell">
                            <span style="min-width: 18px;" class="top-number" {{$notifies->total > 0 ?: 'hidden'}}>{{$notifies->total}}</span>
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
                            <div data-user="{{Auth::id()}}" data-from="{{count($notifies)}}"
                                 class="load-more load_more_notification">
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

                            @if(Auth::user()->isAdmin())
                                <li>
                                    <a href="{{route("admin.dashboards")}}">
                                        <i class="fas fa-home"></i>Truy cập trang quản lý
                                    </a>
                                </li>
                            @endif

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


