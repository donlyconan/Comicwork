@extends('layout.home')


@section('body-page')
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{!!$title!!}</div>

            @if(count($comics) > 0)
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <ul class="list-stories grid-6">
                            @foreach($comics as $comic)
                                <li>
                                    <div class="story-item">
                                        <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128"
                                           title="Đảo Hải Tặc"><img
                                                class="story-cover lazy_cover"
                                                src="http://i.mangaqq.com/ebook/190x247/dao-hai-tac_1552224567.jpg?r=r8645456"
                                                alt="Đảo Hải Tặc"></a>
                                        <div class="top-notice">
                                            <span class="time-ago">20 phút Trước</span>

                                            <span class="type-label hot">Hot</span>
                                        </div>
                                        <h3 class="title-book">
                                            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128"
                                               title="Đảo Hải Tặc">Đảo Hải Tặc</a>
                                        </h3>
                                        <div class="episode-book">
                                            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128-chap-989.html">
                                                Đọc Tiếp Chương 989</a>
                                        </div>

                                        <div class="more-info">
                                            <div class="title-more" style="margin-bottom: 5px;">Đảo Hải Tặc</div>
                                            <p class="info">Tình trạng: Đang Cập Nhật</p>
                                            <p class="info">Lượt xem: 199,094,989</p>
                                            <p class="info">Lượt theo dõi: 83,560</p>

                                            <div class="list-tags">
                                                <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                                    class="blue"
                                                    class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                                    class="blue"
                                                    class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                                    class="blue"
                                                    class="blue"
                                                    href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a>
                                            </div>

                                            <h2><b>Mô tả:</b></h2>
                                            <div class="excerpt">One Piece là câu truyện kể về Luffy và các thuyền viên
                                                của mình.
                                                Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé
                                                thay đổi khi
                                                cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại,
                                                cậu không bao
                                                giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc...
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            @else
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!!</div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
