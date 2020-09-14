@extends("layout.home")

@section("body-page")
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{{$title}}</div>

            <form action="" method="GET" class="story-list-bl01 box">
                @csrf
                <table>
                    <tr>
                        <th>Thể loại</th>
                        <th>Tình trạng</th>
                        <th>Quốc gia</th>
                        <th>Sắp xếp</th>
                        <th>Năm phát hành</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>
                            <div class="select is-warning">
                                <select name="category is-warning">
                                    <option value="Webtoon">Webtoon</option>
                                    <option value="Xuyên Không">Xuyên Không</option>
                                    <option value="Yaoi">Yaoi</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="status">
                                    <option value="1">Đang cập nhật</option>
                                    <option value="0">Đã hoàn thành</option>
                                    <option value="2">Tất cả</option>
                                </select>
                            </div>
                        </td>
                        <td style="margin: 0px;">
                            <div class="select is-warning">
                                <select name="country">
                                    <option value="Trung Quốc">Trung Quốc</option>
                                    <option value="Nhật Bản">Nhật Bản</option>
                                    <option value="Việt Nam">Việt Nam</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="sort">
                                    <option value="1">Thời gian cập nhật</option>
                                    <option value="2">Thời gian đăng</option>
                                    <option value="3">Năm xuất bản</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="select is-warning">
                                <select name="time">
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="all">Tất cả</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <button class="top-buttons" type="submit" value="Tìm kiếm">Duyệt</button>
                        </td>

                    </tr>
                </table>
            </form>

            @if(isset($comics) && $comics->count() > 0)

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
                                        <h3 class="title-book">
                                            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128"
                                               title="Đảo Hải Tặc">{{$comic->name}}</a>
                                        </h3>
                                        <div class="episode-book">
                                            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128-chap-989.html">
{{--                                                {{$comic->chapters->max('chapter')->get()}}--}}
                                            </a>
                                        </div>

                                        <div class="more-info">
                                            <div class="title-more" style="margin-bottom: 5px;">{{$comic->name}}</div>
                                            <p class="info">Tình trạng: Đang Cập Nhật</p>
                                            <p class="info">Lượt xem: 199,094,989</p>
                                            <p class="info">Lượt theo dõi: 83,560</p>

                                            <div class="list-tags">
                                                <a class="blue"
                                                   href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                                    class="blue"
                                                    class="blue"
                                                    href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                                    class="blue"
                                                    class="blue"
                                                    href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
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
                            @endforeach
                        </ul>
                    </div>
                </div>
            <div class="bottom">
                <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
                    {!! $comics->links() !!}
                </nav>
            </div>

            @else
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!!</div>
                    </div>
                </div>
            @endif
        <!-- /.list-stories -->


            {{--            <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">--}}
            {{--                <ul class="pagination-list">--}}
            {{--                    <li><a class="pagination-link is-current" href="javascript:void(0)">1</a></li>--}}
            {{--                    <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-2.html">2</a></li>--}}
            {{--                    <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-3.html">3</a></li>--}}
            {{--                    <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-2.html"><span--}}
            {{--                                aria-hidden="true">›</span></a></li>--}}
            {{--                    <li><a class="pagination-next" href="http://truyenqq.com/the-loai/comic-60/trang-3.html"><span--}}
            {{--                                aria-hidden="true">»</span></a></li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}
        </div>
    </section>
@endsection
