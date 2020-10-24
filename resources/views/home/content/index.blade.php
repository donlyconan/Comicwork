@extends('layout.home')


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
                        <li><a href=""><strong
                                    class="hot">[12:00]</strong> Baki Dou (2018) - Chương 8</a></li>
                        <li><a href=""><strong class="hot">[14:00]</strong>
                                Lang Hoàn Thư Viện - Chương 111</a></li>
                        <li><a href=""><strong
                                    class="">[16:00]</strong> Tôi Thở Cũng Có Thể Mạnh Hơn - Chương 28</a></li>
                        <li><a href=""><strong
                                    class="">[18:00]</strong>
                                Tôi Không Phải Quỷ Vương - Chương 18.2</a></li>
                        <li><a href=""><strong
                                    class="">[20:00]</strong>
                                Đầu Thai Thành Yêu Quái - Chương 6</a></li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="main-content index">
            <div class="container">
                @if(isset($news) and count($news) > 0)
                    <div class="latest">
                        <div class="caption" id="list-update"><a
                                href=""><span
                                    class="starts-icon"></span>Truyện mới cập nhật</a></div>
                        <ul class="list-stories grid-6">
                            @foreach($news as $chapter)
                                @include('include.item-comic', [
                                    'comic'=>$chapter->comicwork()->first(),
                                    'status'=>'new', 'title'=>'New'
                                ])
                            @endforeach
                        </ul>
                        <div class="has-text-centered">
                            <a href="" class="view-more-btn">Xem
                                thêm</a>
                        </div>
                    </div>
                @endif

                @if(isset($most) and count($most) > 0)
                    <div class="latest">
                        <div class="caption" id="list-update">
                            <a href="">
                        <span
                            class="starts-icon"></span>Top truyện thịnh hành</a></div>
                        <ul class="list-stories grid-6">
                            @foreach($most as $item)
                                @includeIf('include.item-comic',[
                                    'comic'=>$item, 'status'=>'hot', 'title'=>'Hot'
                                 ])
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($favs) and count($favs) > 0)
                    <div class="latest">
                        <div class="caption" id="list-update"><a href="">
                        <span
                            class="starts-icon"></span>Top truyện yêu thích</a></div>
                        <ul class="list-stories grid-6">
                            @foreach($favs as $item)
                                @includeIf('include.item-comic',[
                                    'comic'=>$item, 'status'=>'hot', 'title'=>'Hot'
                                 ])
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div id="Top" class="scrollTop none" style="display: none;">
                <span><a href=""><img
                            src="http://static.truyenqq.com/template/frontend/images/back-to-top-icon.png"></a></span>
            </div>
        </section>


        <div class="container quick-link">
            <ul class="list-inline">
                <li>
                    <a href="" title="Truyện tranh">
                        <strong class="text-link">Truyện tranh</strong>
                    </a>
                </li>
            </ul>
        </div>
@endsection
