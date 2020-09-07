<div class="container">
    <div class="level">
        <div class="level-left pc">
                <span class="logo">
                    <a href="/">Truyen QQ</a>
                </span>

            <form class="form-send" action="search" method="get">
                <div class="top-search">
                    <input name="q" type="text" class="text-search" placeholder="Nhập nội dung tìm kiếm...">
                    <button class="submit-btn btn_search"></button>
                    <div class="list-results">
                        <div class="title-search">Tìm kiếm gần đây</div>
                        <div class="list-container">
                        </div>
                    </div>
                </div>
            </form>
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


            @section('login')
                <div id="userinfo" class="top-buttons has-login">
                    <button onclick="location.href = '/login'" id="btn_login" class="login-btn">Đăng
                        nhập
                    </button>
                    <button onclick="location.href = '/signup'" id="btn_register"
                            class="register-btn">Đăng ký
                    </button>
                </div>
            @endsection

            @yield('login')

        </div>
    </div>
</div>


<script>

</script>
