@extends('layout.master')


@section('nominations')
    <section class="hero">
        @include('include.nominations')
    </section>
@endsection


@section('body-page')
    <div class="outsite ">
        <section class="schedule">
            <div class="container">
                <div class="schedule-inner">
                    <div class="time">
                        Lịch Ra Truyện Ngày 03/09/2020
                    </div>
                    <ul class="schedule-list">
                        <li><a href="http://truyenqq.com/truyen-tranh/baki-dou-2018-6321.html"><strong
                                    class="hot">[12:00]</strong> Baki Dou (2018) - Chương 8</a></li>
                        <li><a href="http://truyenqq.com/truyen-tranh/lang-hoan-thu-vien-5456.html"><strong class="hot">[14:00]</strong>
                                Lang Hoàn Thư Viện - Chương 111</a></li>
                        <li><a href="http://truyenqq.com/truyen-tranh/toi-tho-cung-co-the-manh-hon-9830.html"><strong
                                    class="">[16:00]</strong> Tôi Thở Cũng Có Thể Mạnh Hơn - Chương 28</a></li>
                        <li><a href="http://truyenqq.com/truyen-tranh/toi-khong-phai-quy-vuong-9820.html"><strong
                                    class="">[18:00]</strong>
                                Tôi Không Phải Quỷ Vương - Chương 18.2</a></li>
                        <li><a href="http://truyenqq.com/truyen-tranh/dau-thai-thanh-yeu-quai-10129.html"><strong
                                    class="">[20:00]</strong>
                                Đầu Thai Thành Yêu Quái - Chương 6</a></li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="main-content index">
            <div class="container">
                <div class="latest">
                    <div class="caption" id="list-update"><a href="http://truyenqq.com/truyen-moi-cap-nhat.html"><span
                                class="starts-icon"></span>Truyện mới cập nhật</a></div>
                    <ul class="list-stories grid-6">
                        @for($i=1; $i <= 6; $i++)
                            @include('include.item')
                        @endfor
                    </ul>
                    <div class="has-text-centered">
                        <a href="http://truyenqq.com/truyen-moi-cap-nhat/trang-2.html" class="view-more-btn">Xem
                            thêm</a>
                    </div>
                </div>

                <div class="latest">
                    <div class="caption" id="list-update"><a href="http://truyenqq.com/truyen-moi-cap-nhat.html">
                        <span
                            class="starts-icon"></span>Top truyện thịnh hành</a></div>
                    <ul class="list-stories grid-6">
                        @for($i=1; $i <= 6; $i++)
                            @include('include.item')
                        @endfor
                    </ul>

                    <div class="has-text-centered">
                        <a href="http://truyenqq.com/truyen-moi-cap-nhat/trang-2.html" class="view-more-btn">Xem
                            thêm</a>
                    </div>
                </div>

                <div class="latest">
                    <div class="caption" id="list-update"><a href="http://truyenqq.com/truyen-moi-cap-nhat.html">
                        <span
                            class="starts-icon"></span>Top truyện yêu thích</a></div>
                    <ul class="list-stories grid-6">
                        @for($i=1; $i <= 6; $i++)
                            @include('include.item')
                        @endfor
                    </ul>
                    <div class="has-text-centered">
                        <a href="http://truyenqq.com/truyen-moi-cap-nhat/trang-2.html" class="view-more-btn">Xem
                            thêm</a>
                    </div>
                </div>
            </div>
            <div id="Top" class="scrollTop none" style="display: none;">
            <span><a href=""><img src="http://static.truyenqq.com/template/frontend/images/back-to-top-icon.png"></a></span>
            </div>
        </section>


        <div class="container quick-link">
            <ul class="list-inline">
                <li>
                    <a href="http://truyenqq.com" title="Truyện tranh">
                        <strong class="text-link">Truyện tranh</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Truyen tranh online">
                        <strong class="text-link">Truyen tranh online</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Truyện tranh online">
                        <strong class="text-link">Truyện tranh online</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Doc truyen tranh">
                        <strong class="text-link">Doc truyen tranh</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Đọc truyện tranh">
                        <strong class="text-link">Đọc truyện tranh</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Manhua">
                        <strong class="text-link">Manhua</strong>
                    </a>
                </li>
                <li>
                    <a href="http://truyenqq.com" title="Manga">
                        <strong class="text-link">Manga</strong>
                    </a>
                </li>
            </ul>
        </div>
@endsection
