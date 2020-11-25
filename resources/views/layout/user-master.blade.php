@extends("layout.home")

@section("body-page")
    <section class="main-content">
        <div class="container">
            <div class="messages columns">
                <div class="column is-narrow left pc">
                    <ul class="nav-user">
                        <li><a class="li01 is-active" href="{{route('user.info')}}">Quản lý tài
                                khoản</a></li>
{{--                        <li><a class="li02 " href="">Tin nhắn</a></li>--}}
                        <li><a class="li03 " href="{{route('user.account')}}">Đổi mật khẩu</a></li>
                    </ul>
                </div>


                @yield("user-info-body")
            </div>
        </div>
    </section>
@endsection
