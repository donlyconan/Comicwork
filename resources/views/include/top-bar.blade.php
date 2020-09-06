<div class="container">
    <div class="level">
        <div class="level-left pc">
                <span class="logo">
                    <a href="/">Truyen QQ</a>
                </span>

            <form class="form-send" action="/search" method="get">
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


<script>

</script>
