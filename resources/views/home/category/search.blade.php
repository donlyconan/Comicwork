<body>
@include('share.header');
<section class="main-content">
    <div class="container story-list">
        <div class="title-list">Truyện Comic</div>
        <div class="box">
            Truyện tranh Châu Âu và Châu Mĩ
        </div>

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
                        <button class="top-buttons" type="submit" value="Tìm kiếm">Tìm kiếm</button>
                    </td>

                </tr>
            </table>
        </form>

        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
                <ul class="list-stories grid-6">
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/all-new-ghost-rider-10032"
                               title="All-New Ghost Rider"><img class="story-cover lazy_cover"
                                                                src="http://i.mangaqq.com/ebook/190x247/all-new-ghost-rider_1594187680.jpg?r=r8645456"
                                                                alt="All-New Ghost Rider"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/all-new-ghost-rider-10032"
                                                      title="All-New Ghost Rider">All-New Ghost Rider</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/all-new-ghost-rider-10032-chap-12.html">
                                    Chương 12</a></div>
                            <div class="more-info">
                                <div class="title-more">All-New Ghost Rider</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 4,132</p>
                                <p class="info">Lượt theo dõi: 26</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt"></div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/hawkeye-2012-10031" title="Hawkeye 2012"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/hawkeye-2012_1594179925.jpg?r=r8645456"
                                    alt="Hawkeye 2012"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/hawkeye-2012-10031"
                                                      title="Hawkeye 2012">Hawkeye 2012</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/hawkeye-2012-10031-chap-22.html"> Chương
                                    22</a></div>
                            <div class="more-info">
                                <div class="title-more">Hawkeye 2012</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,714</p>
                                <p class="info">Lượt theo dõi: 13</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                        Arts</a><a class="blue" href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-Fi</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adult-68.html">Adult</a></div>
                                <div class="excerpt">Những chuyến phiêu lưu đầy lý thú xoay quanh đời sống thường nhật
                                    của nhân vật Hawkeye
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/100th-anniversary-special-10023"
                               title="100Th Anniversary Special"><img class="story-cover lazy_cover"
                                                                      src="http://i.mangaqq.com/ebook/190x247/100th-anniversary-special_1594161239.jpg?r=r8645456"
                                                                      alt="100Th Anniversary Special"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/100th-anniversary-special-10023"
                                    title="100Th Anniversary Special">100Th Anniversary Special</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/100th-anniversary-special-10023-chap-5.html">
                                    Chương 5</a></div>
                            <div class="more-info">
                                <div class="title-more">100Th Anniversary Special</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 2,267</p>
                                <p class="info">Lượt theo dõi: 4</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt"></div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/guardians-of-the-galaxy-v3-2013-10018"
                               title="Guardians Of The Galaxy V3 2013"><img class="story-cover lazy_cover"
                                                                            src="http://i.mangaqq.com/ebook/190x247/guardians-of-the-galaxy-v3-2013_1594113125.jpg?r=r8645456"
                                                                            alt="Guardians Of The Galaxy V3 2013"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/guardians-of-the-galaxy-v3-2013-10018"
                                    title="Guardians Of The Galaxy V3 2013">Guardians Of The Galaxy V3 2013</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/guardians-of-the-galaxy-v3-2013-10018-chap-27.html">
                                    Chương 27</a></div>
                            <div class="more-info">
                                <div class="title-more">Guardians Of The Galaxy V3 2013</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 4,275</p>
                                <p class="info">Lượt theo dõi: 20</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-Fi</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt"></div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/secret-wars-10017" title="Secret Wars"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/secret-wars_1594113073.jpg?r=r8645456"
                                    alt="Secret Wars"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/secret-wars-10017"
                                                      title="Secret Wars">Secret Wars</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/secret-wars-10017-chap-9.html"> Chương 9</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Secret Wars</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,884</p>
                                <p class="info">Lượt theo dõi: 24</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-Fi</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Va chạm đa vũ trụ cuối cùng đang diễn ra! Vũ trụ Marvel sẽ va chạm
                                    với vũ trụ Ultimate! Và chỉ một trong hai vũ trụ có thể tồn tại!
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/django-pha-xieng-9633"
                               title="Django Phá Xiềng"><img class="story-cover lazy_cover"
                                                             src="http://i.mangaqq.com/ebook/190x247/django-pha-xieng_1589724360.jpg?r=r8645456"
                                                             alt="Django Phá Xiềng"></a>
                            <div class="top-notice">
                                <span class="time-ago">3 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/django-pha-xieng-9633"
                                                      title="Django Phá Xiềng">Django Phá Xiềng</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/django-pha-xieng-9633-chap-7.html"> Chương
                                    7</a></div>
                            <div class="more-info">
                                <div class="title-more">Django Phá Xiềng</div>
                                <div class="title-more-other">Tên khác: Django Unchained</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,073</p>
                                <p class="info">Lượt theo dõi: 10</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Dựa theo bộ phim cùng tên nổi tiếng của đạo diễn lừng danh Quentin
                                    Tarantino, truyện xoay quanh hành trình cứu vợ của Django, một nô lệ da đen này đã
                                    được tự do nhờ bác sĩ King Schultz. P/s: Tôi không biết xóa watermark, nhưng vui
                                    lòng re-up giữ credit&nbsp;
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/doc-phi-tai-thuong-9062"
                               title="Độc Phi Tại Thượng"><img class="story-cover lazy_cover"
                                                               src="http://i.mangaqq.com/ebook/190x247/doc-phi-tai-thuong_1582604169.jpg?r=r8645456"
                                                               alt="Độc Phi Tại Thượng"></a>
                            <div class="top-notice">
                                <span class="time-ago">6 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/doc-phi-tai-thuong-9062"
                                                      title="Độc Phi Tại Thượng">Độc Phi Tại Thượng</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/doc-phi-tai-thuong-9062-chap-10.html"> Chương
                                    10</a></div>
                            <div class="more-info">
                                <div class="title-more">Độc Phi Tại Thượng</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 69,092</p>
                                <p class="info">Lượt theo dõi: 1,244</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/manhua-35.html">Manhua</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/ngon-tinh-87.html">Ngôn Tình</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/xuyen-khong-88.html">Xuyên
                                        Không</a><a class="blue" href="http://truyenqq.com/the-loai/co-dai-90.html">Cổ
                                        Đại</a><a class="blue" href="http://truyenqq.com/the-loai/chuyen-sinh-91.html">Chuyển
                                        Sinh</a><a class="blue" href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện
                                        Màu</a></div>
                                <div class="excerpt">" Soái ca , giang hồ cứu cấp! Mượn quần áo ngươi mặc một chút!" Sau
                                    đó liền lột sạch y phục của Tà Vương đang tu luyện, tiêu dao chạy trốn. Hắn là đại
                                    lục này chúng sinh cúng bái tôn, thần bí, cao quý, không thể leo tới. Nàng hiện đại
                                    Sát Thủ Chi Vương, nàng tránh hắn như xà hạt, hắn quấn nàng quấn ...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/hay-ve-day-come-back-to-me-again-8882"
                               title="Hãy Về Đây - Come Back To Me Again"><img class="story-cover lazy_cover"
                                                                               src="http://i.mangaqq.com/ebook/190x247/hay-ve-day-come-back-to-me-again_1579657162.jpg?r=r8645456"
                                                                               alt="Hãy Về Đây - Come Back To Me Again"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/hay-ve-day-come-back-to-me-again-8882"
                                    title="Hãy Về Đây - Come Back To Me Again">Hãy Về Đây - Come Back To Me Again</a>
                            </h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/hay-ve-day-come-back-to-me-again-8882-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Hãy Về Đây - Come Back To Me Again</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 9,019</p>
                                <p class="info">Lượt theo dõi: 17</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Bộ truyện thuật lại câu chuyện về một con nghiện đủ thể loại - rượu
                                    bia, vang, vodka, whisky, acid, muối tắm, cocain, cần sa, vân vân qua những khung
                                    tranh đầy góc cạnh và sần sùi, mang đến một cái nhìn đầy chân thật về "thế giới sau
                                    khi phê" và những tác động của nó lên đời sống một con người.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/khe-kinh-hon-8841" title="Khe Kinh Hồn"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/khe-kinh-hon_1579147243.jpg?r=r8645456"
                                    alt="Khe Kinh Hồn"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/khe-kinh-hon-8841"
                                                      title="Khe Kinh Hồn">Khe Kinh Hồn</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/khe-kinh-hon-8841-chap-1.html"> Chương 1</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Khe Kinh Hồn</div>
                                <div class="title-more-other">Tên khác: Peek A Boo!!</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 9,404</p>
                                <p class="info">Lượt theo dõi: 43</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Điều gì sẽ xảy ra khiến một chuyến bộ hành du lịch trở thành ác
                                    mộng khi đoàn tham quan đi vào 1 trong những khe rãnh nguy hiểm nhất thế giới cho
                                    một trải nghiệm chuyên biệt hiếm có? Mời các bạn cùng beeng.net khám phá chuyến dã
                                    ngoại kinh dị này nhé.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/the-war-of-the-orcs-8823"
                               title="The War Of The Orcs"><img class="story-cover lazy_cover"
                                                                src="http://i.mangaqq.com/ebook/190x247/the-war-of-the-orcs_1578831287.jpg?r=r8645456"
                                                                alt="The War Of The Orcs"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/the-war-of-the-orcs-8823"
                                                      title="The War Of The Orcs">The War Of The Orcs</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/the-war-of-the-orcs-8823-chap-2.html"> Chương
                                    2</a></div>
                            <div class="more-info">
                                <div class="title-more">The War Of The Orcs</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,773</p>
                                <p class="info">Lượt theo dõi: 33</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Giống như tên gọi, Chiến Tranh Loài Orc là bộ truyện xoay quanh
                                    những tháng ngày hung hiểm nhất khi con người, drawf, elf liên minh lại để dồn ép
                                    loài orc vào đường tận diệt. Liệu những chiến binh orc cuối cùng có mở mang được đầu
                                    óc và tiếp thu những cách thức mới để chống trả?
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/everywhere-nowhere-8689"
                               title="Everywhere &amp; Nowhere"><img class="story-cover lazy_cover"
                                                                     src="http://i.mangaqq.com/ebook/190x247/everywhere-nowhere_1576910201.jpg?r=r8645456"
                                                                     alt="Everywhere &amp; Nowhere"></a>
                            <div class="top-notice">
                                <span class="time-ago">9 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/everywhere-nowhere-8689"
                                                      title="Everywhere &amp; Nowhere">Everywhere &amp; Nowhere</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/everywhere-nowhere-8689-chap-2.html"> Chương
                                    2</a></div>
                            <div class="more-info">
                                <div class="title-more">Everywhere &amp; Nowhere</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,714</p>
                                <p class="info">Lượt theo dõi: 104</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/school-life-37.html">School
                                        Life</a><a class="blue" href="http://truyenqq.com/the-loai/historical-51.html">Historical</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt"></div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/requiem-hiep-si-ma-ca-rong-8092"
                               title="Requiem Hiệp Sĩ Ma Cà Rồng"><img class="story-cover lazy_cover"
                                                                       src="http://i.mangaqq.com/ebook/190x247/requiem-hiep-si-ma-ca-rong_1567826720.jpg?r=r8645456"
                                                                       alt="Requiem Hiệp Sĩ Ma Cà Rồng"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/requiem-hiep-si-ma-ca-rong-8092"
                                    title="Requiem Hiệp Sĩ Ma Cà Rồng">Requiem Hiệp Sĩ Ma Cà Rồng</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/requiem-hiep-si-ma-ca-rong-8092-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Requiem Hiệp Sĩ Ma Cà Rồng</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 9,171</p>
                                <p class="info">Lượt theo dõi: 26</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/historical-51.html">Historical</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Đẫm máu. Đen tối. Điên loạn. Đón chào đến với thế giới sau khi
                                    chết, ở nơi địa ngục ma quỷ hoành hành, thời gian đảo ngược. Nhât vật chính là một
                                    binh lính Đức Quốc Xã bỏ mạng ở chiến trường, theo guồng quay của số phận mà trở
                                    thành một Hiệp Sĩ Ma Cà Rồng với tước danh Requiem - với khát vọng đau đá...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/orcs-goblins-hung-quy-quy-lun-8067"
                               title="Orcs &amp; Goblins - Hung Quỷ &amp; Quỷ Lùn"><img class="story-cover lazy_cover"
                                                                                        src="http://i.mangaqq.com/ebook/190x247/orcs-goblins-hung-quy-quy-lun_1567585050.jpg?r=r8645456"
                                                                                        alt="Orcs &amp; Goblins - Hung Quỷ &amp; Quỷ Lùn"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/orcs-goblins-hung-quy-quy-lun-8067"
                                    title="Orcs &amp; Goblins - Hung Quỷ &amp; Quỷ Lùn">Orcs &amp; Goblins - Hung Quỷ
                                    &amp; Quỷ Lùn</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/orcs-goblins-hung-quy-quy-lun-8067-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Orcs &amp; Goblins - Hung Quỷ &amp; Quỷ Lùn</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,669</p>
                                <p class="info">Lượt theo dõi: 45</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện
                                        Màu</a></div>
                                <div class="excerpt">Cùng vũ trụ với 2 bộ truyện về Tiên Tộc (Elf) và Người Lùn (Dwarf),
                                    bộ truyện xoay quanh những sự kiện của Orc và Goblin, và, với quan điểm xuyên suốt
                                    rằng trong ác có thiện, trong thiện có ác của cụm tác phẩm, thì, khi đến phiên được
                                    làm nhân vật chính, tất yếu Hung Quỷ &amp; Quỷ Lùn cũng sẽ được t...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/bon-chuot-8036" title="Bọn Chuột"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/bon-chuot_1567074424.jpg?r=r8645456"
                                    alt="Bọn Chuột"></a>
                            <div class="top-notice">
                                <span class="time-ago">7 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/bon-chuot-8036"
                                                      title="Bọn Chuột">Bọn Chuột</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/bon-chuot-8036-chap-9-5.html"> Chương 9.5</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Bọn Chuột</div>
                                <div class="title-more-other">Tên khác: Scurry</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 24,770</p>
                                <p class="info">Lượt theo dõi: 143</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Bọn Chuột là một truyện tranh động vật giả tưởng đen tối về một đàn
                                    chuột trong một ngôi nhà bỏ hoang đang phải vật lộn để sống sót qua một mùa đông
                                    dài, kỳ lạ. Bị săn bắt bởi mèo hoang và chim săn mồi là một phần của cuộc sống của
                                    những con chuột này, nhưng vượt ra ngoài hàng rào rình rập một cái g...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/konungar-ac-chien-vuong-vi-8015"
                               title="Konungar - Ác Chiến Vương Vị"><img class="story-cover lazy_cover"
                                                                         src="http://i.mangaqq.com/ebook/190x247/konungar-ac-chien-vuong-vi_1566830774.jpg?r=r8645456"
                                                                         alt="Konungar - Ác Chiến Vương Vị"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/konungar-ac-chien-vuong-vi-8015"
                                    title="Konungar - Ác Chiến Vương Vị">Konungar - Ác Chiến Vương Vị</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/konungar-ac-chien-vuong-vi-8015-chap-2.html">
                                    Chương 2</a></div>
                            <div class="more-info">
                                <div class="title-more">Konungar - Ác Chiến Vương Vị</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,664</p>
                                <p class="info">Lượt theo dõi: 32</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Với những Viking, Centaur (ngưu nhân), Troll (cự quỷ), Berzerker
                                    (cuồng thi) - Konungar là một thiên huyền sử về cuộc tranh đoạt lãnh thổ với thù
                                    trong giặc ngoài đầy hỗn loạn và bi tráng thời trung cổ ở Bắc Âu. Ngôi báu của xứ
                                    Alstavik rồi sẽ thuộc về ai?
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/bien-nien-su-han-thu-chronicles-of-hate-7999"
                               title="Biên Niên Sử Hận Thù - Chronicles Of Hate"><img class="story-cover lazy_cover"
                                                                                      src="http://i.mangaqq.com/ebook/190x247/bien-nien-su-han-thu-chronicles-of-hate_1566637025.jpg?r=r8645456"
                                                                                      alt="Biên Niên Sử Hận Thù - Chronicles Of Hate"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/bien-nien-su-han-thu-chronicles-of-hate-7999"
                                    title="Biên Niên Sử Hận Thù - Chronicles Of Hate">Biên Niên Sử Hận Thù - Chronicles
                                    O...</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/bien-nien-su-han-thu-chronicles-of-hate-7999-chap-2-2.html">
                                    Chương 2.2</a></div>
                            <div class="more-info">
                                <div class="title-more">Biên Niên Sử Hận Thù - Chronicles Of Hate</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 12,087</p>
                                <p class="info">Lượt theo dõi: 32</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Ở một thế giới mà mặt trời bị đông cứng và mặt trăng bị nung chảy,
                                    một người hùng không tưởng trỗi dậy, cứu lấy Mẹ Trái Đất khỏi xiềng xích của mình.
                                    Con đường của anh ta đi là một con đường u tối đầy chông gai với vô số đạo quân của
                                    kẻ thù đón chờ. Một bộ truyện đầy chất ám ảnh và đen tối với những...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/nguoi-co-gioi-androids-7986"
                               title="Người Cơ Giới - Androids"><img class="story-cover lazy_cover"
                                                                     src="http://i.mangaqq.com/ebook/190x247/nguoi-co-gioi-androids_1566533740.jpg?r=r8645456"
                                                                     alt="Người Cơ Giới - Androids"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nguoi-co-gioi-androids-7986"
                                    title="Người Cơ Giới - Androids">Người Cơ Giới - Androids</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nguoi-co-gioi-androids-7986-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Người Cơ Giới - Androids</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,384</p>
                                <p class="info">Lượt theo dõi: 17</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Lấy bối cảnh năm 2545, 500 năm sau khi tập đoàn Microcorp tìm ra
                                    công thức tạo nên "thuốc xanh" giúp con người trở nên bất tử trước mọi loại bệnh tật
                                    và có được tuổi trẻ bất tận [tất nhiên không miễn nhiễm trước vũ khí &amp; thảm hoạ
                                    sát nhân]. Thời điểm này, con người sống cùng những android - ngườ...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/vuong-bai-giao-thao-my-nam-doan-7930"
                               title="Vương Bài Giáo Thảo Mỹ Nam Đoàn"><img class="story-cover lazy_cover"
                                                                            src="http://i.mangaqq.com/ebook/190x247/vuong-bai-giao-thao-my-nam-doan_1565863280.jpg?r=r8645456"
                                                                            alt="Vương Bài Giáo Thảo Mỹ Nam Đoàn"></a>
                            <div class="top-notice">
                                <span class="time-ago">10 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/vuong-bai-giao-thao-my-nam-doan-7930"
                                    title="Vương Bài Giáo Thảo Mỹ Nam Đoàn">Vương Bài Giáo Thảo Mỹ Nam Đoàn</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/vuong-bai-giao-thao-my-nam-doan-7930-chap-26.html">
                                    Chương 26</a></div>
                            <div class="more-info">
                                <div class="title-more">Vương Bài Giáo Thảo Mỹ Nam Đoàn</div>
                                <div class="title-more-other">Tên khác: Vương Bài Giáo Thảo Mỹ Nam Đường</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 118,101</p>
                                <p class="info">Lượt theo dõi: 1,018</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/manhua-35.html">Manhua</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/school-life-37.html">School
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện
                                        Màu</a></div>
                                <div class="excerpt">Vị hôn phu đẹp trai giàu có bị nghi ngờ là Gay? Còn không thể từ
                                    hôn?? Ha, xem tôi giả trai vào trường bẻ cong anh đây!
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/chuyen-cua-yokai-7926"
                               title="Chuyện Của Yokai"><img class="story-cover lazy_cover"
                                                             src="http://i.mangaqq.com/ebook/190x247/chuyen-cua-yokai_1565860871.jpg?r=r8645456"
                                                             alt="Chuyện Của Yokai"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span> <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/chuyen-cua-yokai-7926"
                                                      title="Chuyện Của Yokai">Chuyện Của Yokai</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/chuyen-cua-yokai-7926-chap-62.html"> Chương
                                    62</a></div>
                            <div class="more-info">
                                <div class="title-more">Chuyện Của Yokai</div>
                                <div class="title-more-other">Tên khác: Yokai Day</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 220,185</p>
                                <p class="info">Lượt theo dõi: 686</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/webtoon-55.html">Webtoon</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/anime-62.html">Anime</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/one-shot-95.html">One Shot</a>
                                </div>
                                <div class="excerpt">Đại khái là những mẩu truyện ngắn nói về các bạn Yokai (yêu quái),
                                    theo 1 cách...không được bình thường lắm&nbsp;nhưng lại rất đáng yêu!!
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/royal-city-7592" title="Royal City"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/royal-city_1562464250.jpg?r=r8645456"
                                    alt="Royal City"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/royal-city-7592"
                                                      title="Royal City">Royal City</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/royal-city-7592-chap-3.html"> Chương 3</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Royal City</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 2,008</p>
                                <p class="info">Lượt theo dõi: 5</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Một câu chuyện mang đầy tính chất tâm lý được chấp bút và thực hiện
                                    bởi Jeff Lemire — bậc thầy của những thể loại tâm lý. Royal city kể về 1 gia đình
                                    tại thành phố royal với rất nhiều những vấn đề riêng, nhưng điểm chung của họ lại là
                                    một nỗi ám ảnh bí ẩn về người em út.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/death-of-wolverine-deadpool-captain-america-one-shot-7556"
                               title="Death Of Wolverine - Deadpool &amp; Captain America [One Shot]"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/death-of-wolverine-deadpool-captain-america-one-shot_1562206057.jpg?r=r8645456"
                                    alt="Death Of Wolverine - Deadpool &amp; Captain America [One Shot]"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/death-of-wolverine-deadpool-captain-america-one-shot-7556"
                                    title="Death Of Wolverine - Deadpool &amp; Captain America [One Shot]">Death Of
                                    Wolverine - Deadpool &amp; Cap...</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/death-of-wolverine-deadpool-captain-america-one-shot-7556-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Death Of Wolverine - Deadpool &amp; Captain America [One Shot]
                                </div>
                                <div class="title-more-other">Tên khác: Death Of Wolverine - Deadpool &amp;Amp; Captain
                                    America [One Shot]
                                </div>
                                <p class="info">Tình trạng: Hoàn Thành</p>
                                <p class="info">Lượt xem: 13,531</p>
                                <p class="info">Lượt theo dõi: 24</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-Fi</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adult-68.html">Adult</a></div>
                                <div class="excerpt">Sau cái chết của Logan, Cap và Pool đã cùng nhau tham gia một phi
                                    vụ nhằm bảo đảm cho The Wolverine thực sự được "yên nghỉ".
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/bao-thu-mat-doi-2010-7507"
                               title="Báo Thù Mật Đội 2010"><img class="story-cover lazy_cover"
                                                                 src="http://i.mangaqq.com/ebook/190x247/bao-thu-mat-doi-2010_1561720046.jpg?r=r8645456"
                                                                 alt="Báo Thù Mật Đội 2010"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/bao-thu-mat-doi-2010-7507"
                                                      title="Báo Thù Mật Đội 2010">Báo Thù Mật Đội 2010</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/bao-thu-mat-doi-2010-7507-chap-5-5.html">
                                    Chương 5.5</a></div>
                            <div class="more-info">
                                <div class="title-more">Báo Thù Mật Đội 2010</div>
                                <div class="title-more-other">Tên khác: Secret Avengers 2010 | Báo Thù Mật Đội 2010
                                </div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 7,285</p>
                                <p class="info">Lượt theo dõi: 25</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Báo Thù Mật Đội - tổ hợp những kỳ tài được Steve Rogers tụ hội để
                                    đến những góc khuất của thế giới để ngăn chặn những thảm hoạ theo những phương thức
                                    đặc biệt. Liệu bọn họ sẽ là nửa điệp viên, nửa siêu anh hùng, sẽ là ý tưởng mới nhất
                                    của Thủ Lĩnh Hoa Kỳ nhằm bảo vệ thế giới, hay, họ sẽ... là cả hai...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/nhung-cuoc-phieu-luu-cua-tintin-7487"
                               title="Những Cuộc Phiêu Lưu Của Tintin"><img class="story-cover lazy_cover"
                                                                            src="http://i.mangaqq.com/ebook/190x247/nhung-cuoc-phieu-luu-cua-tintin_1561538937.jpg?r=r8645456"
                                                                            alt="Những Cuộc Phiêu Lưu Của Tintin"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nhung-cuoc-phieu-luu-cua-tintin-7487"
                                    title="Những Cuộc Phiêu Lưu Của Tintin">Những Cuộc Phiêu Lưu Của Tintin</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nhung-cuoc-phieu-luu-cua-tintin-7487-chap-2.html">
                                    Chương 2</a></div>
                            <div class="more-info">
                                <div class="title-more">Những Cuộc Phiêu Lưu Của Tintin</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,129</p>
                                <p class="info">Lượt theo dõi: 21</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Những cuộc phiêu lưu của Tintin (tiếng Pháp: Les Aventures de
                                    Tintin) là bộ truyện tranh nhiều tập do hoạ sĩ người Bỉ Georges Remi (1907–1983)
                                    sáng tác dưới bút danh Hergé. Đây là một trong những bộ truyện tranh châu Âu nổi
                                    tiếng nhất thế kỷ 20. Cho đến lần sinh nhật thứ 100 của Hergé năm 2007,[1] T...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/1001-dem-a-rap-nhung-chuyen-phieu-luu-cua-sinbad-7475"
                               title="1001 Đêm Ả Rập: Những Chuyến Phiêu Lưu Của Sinbad"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/1001-dem-a-rap-nhung-chuyen-phieu-luu-cua-sinbad_1561369035.jpg?r=r8645456"
                                    alt="1001 Đêm Ả Rập: Những Chuyến Phiêu Lưu Của Sinbad"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/1001-dem-a-rap-nhung-chuyen-phieu-luu-cua-sinbad-7475"
                                    title="1001 Đêm Ả Rập: Những Chuyến Phiêu Lưu Của Sinbad">1001 Đêm Ả Rập: Những
                                    Chuyến Phiêu ...</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/1001-dem-a-rap-nhung-chuyen-phieu-luu-cua-sinbad-7475-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">1001 Đêm Ả Rập: Những Chuyến Phiêu Lưu Của Sinbad</div>
                                <div class="title-more-other">Tên khác: 1001 Đêm Ả Rập: Những Chuyến Phiêu Lưu Của
                                    Sinbad | 1001 Arabian Nights: The Adventures Of Sinbad
                                </div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 58,123</p>
                                <p class="info">Lượt theo dõi: 71</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adult-68.html">Adult</a></div>
                                <div class="excerpt">Sinbad - một trong hai nhân vật đình đám bậc nhất của văn hóa phẩm
                                    Ả Rập - trở lại cùng những chuyến hành trình mới của mình trên khắp đại dương với
                                    một thủy thủ đoàn mới và những thách thức khó lường.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/blacksad-7464" title="Blacksad"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/blacksad_1561340465.jpg?r=r8645456"
                                    alt="Blacksad"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/blacksad-7464"
                                                      title="Blacksad">Blacksad</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/blacksad-7464-chap-2.html"> Chương 2</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Blacksad</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,310</p>
                                <p class="info">Lượt theo dõi: 12</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Blacksad, một câu chuyện giản dị mang nhiều chất thơ được thể hiện
                                    qua lối kịch bản, một phương pháp kể chuyện hoàn toàn mới nhưng cũng không kém phần
                                    mê hoặc. Trong bộ truyện, nó sẽ đưa chúng ta qua những cung bậc cảm xúc bằng những
                                    khung tranh sử dụng màu sắc ấn tượng, chi tiết. Nó còn phản ánh rõ...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/battle-beasts-7447" title="Battle Beasts"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/battle-beasts_1561214801.jpg?r=r8645456"
                                    alt="Battle Beasts"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/battle-beasts-7447"
                                                      title="Battle Beasts">Battle Beasts</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/battle-beasts-7447-chap-1-1.html"> Chương
                                    1.1</a></div>
                            <div class="more-info">
                                <div class="title-more">Battle Beasts</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,632</p>
                                <p class="info">Lượt theo dõi: 11</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                        Arts</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Chào mừng các bạn đến với thế giới của Battle Beasts - Mãnh Thú
                                    Chiến Đồ - một câu chuyện xoanh quanh bộ ba mãnh thú với sứ mệnh tìm kiếm những vũ
                                    khí kinh thế nhằm chấm dứt cuộc chiến bất tận đang dẫn cả chủng tộc đến bờ vực diệt
                                    vong. Mọi thứ trở nên phức tạp khi những vũ khí nói trên lại hiện hữu...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/dem-ngan-soi-du-7439" title="Đêm Ngàn Sói Dữ"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/dem-ngan-soi-du_1561118404.jpg?r=r8645456"
                                    alt="Đêm Ngàn Sói Dữ"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/dem-ngan-soi-du-7439"
                                                      title="Đêm Ngàn Sói Dữ">Đêm Ngàn Sói Dữ</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/dem-ngan-soi-du-7439-chap-1-1.html"> Chương
                                    1.1</a></div>
                            <div class="more-info">
                                <div class="title-more">Đêm Ngàn Sói Dữ</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,587</p>
                                <p class="info">Lượt theo dõi: 12</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/horror-44.html">Horror</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Một đầu truyện kinh dị với bối cảnh thời Trung Cổ về một bầy sói
                                    cuồng bạo ám ảnh xâu xé mọi sinh vật, và bi kịch bắt đầu với gia đình của&nbsp;Harrick
                                    Benjyon, một gia đình sống biệt lập gần những cánh rừng tăm tối. Đẫm máu, tàn độc,
                                    quỷ dị
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/marsupilami-7438" title="Marsupilami"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/marsupilami_1561114928.jpg?r=r8645456"
                                    alt="Marsupilami"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/marsupilami-7438"
                                                      title="Marsupilami">Marsupilami</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/marsupilami-7438-chap-1.html"> Chương 1</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Marsupilami</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,166</p>
                                <p class="info">Lượt theo dõi: 14</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Cùng đến với những chuyến phiêu lưu kỳ thú của siêu thú
                                    Marsupilami, loài động vật tưởng tượng thú vị và thông minh bậc nhất nơi những cánh
                                    rừng Nam Mỹ nổi tiếng khắp toàn cầu.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/constantine-futures-end-7316"
                               title="Constantine Futures End"><img class="story-cover lazy_cover"
                                                                    src="http://i.mangaqq.com/ebook/190x247/constantine-futures-end_1559917054.jpg?r=r8645456"
                                                                    alt="Constantine Futures End"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/constantine-futures-end-7316"
                                    title="Constantine Futures End">Constantine Futures End</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/constantine-futures-end-7316-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Constantine Futures End</div>
                                <div class="title-more-other">Tên khác: Constantine Futures End [One Shot]</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,338</p>
                                <p class="info">Lượt theo dõi: 6</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/one-shot-95.html">One Shot</a>
                                </div>
                                <div class="excerpt">Kẻ cứu rỗi nhân loại - John Constantine trong hành trình mới - tại
                                    tương lai - năm năm sau cuộc chiến
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/transformer-film-comic-series-6769"
                               title="Transformer Film Comic Series"><img class="story-cover lazy_cover"
                                                                          src="http://i.mangaqq.com/ebook/190x247/transformer-film-comic-series_1551873348.jpg?r=r8645456"
                                                                          alt="Transformer Film Comic Series"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/transformer-film-comic-series-6769"
                                    title="Transformer Film Comic Series">Transformer Film Comic Series</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/transformer-film-comic-series-6769-chap-2.html">
                                    Chương 2</a></div>
                            <div class="more-info">
                                <div class="title-more">Transformer Film Comic Series</div>
                                <div class="title-more-other">Tên khác: Transformer Bayverse</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 5,443</p>
                                <p class="info">Lượt theo dõi: 18</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Series truyện tranh&nbsp;dựa trên&nbsp;vũ trụ phim
                                    Transformer.----Hẳn các bác đã quá quen thuộc series phim Transformer của bác
                                    Michael Vịnh với kĩ xảo, cháy nổ, gái gú,... và một cốt truyện không não đầy những
                                    trò đùa nhạt nhẽo.&nbsp;. Trái lại, series truyện tranh ăn theo phim của IDW lại
                                    không chỉ mở rộng vũ t...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/happy-death-6525" title="Happy Death"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/happy-death_1548769490.jpg?r=r8645456"
                                    alt="Happy Death"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/happy-death-6525"
                                                      title="Happy Death">Happy Death</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/happy-death-6525-chap-4.html"> Chương 4</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Happy Death</div>
                                <div class="title-more-other">Tên khác: Cái Chết Hạnh Phúc</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 11,311</p>
                                <p class="info">Lượt theo dõi: 14</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện
                                        Màu</a></div>
                                <div class="excerpt">Khi một kẻ ngốc đánh mất nụ cười của mình. Khi mọi người xung quanh
                                    anh ta đang mỉm cười qua một lời nói dối. Khi người anh ấy sống để cười qua mặt nạ.
                                    Anh ta sẽ ước cho một cái chết hạnh phúc
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/starcraft-2009-6472" title="Starcraft 2009"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/starcraft-2009_1547963869.jpg?r=r8645456"
                                    alt="Starcraft 2009"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/starcraft-2009-6472"
                                                      title="Starcraft 2009">Starcraft 2009</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/starcraft-2009-6472-chap-4-5.html"> Chương
                                    4.5</a></div>
                            <div class="more-info">
                                <div class="title-more">Starcraft 2009</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 5,604</p>
                                <p class="info">Lượt theo dõi: 5</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Dựa trên trò chơi ăn khách lừng danh những năm 2000, bộ truyện xoay
                                    quanh những thành viên của Warpigs - đội đặc nhiệm bất hảo Chiến Trư cùng những nhân
                                    vật cốt lõi của StarCraft như Jim Raynor, Tamsen Cauley và hoàng đế&nbsp;Arcturus
                                    Mengsk
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/street-fighter-unlimited-6471"
                               title="Street Fighter Unlimited"><img class="story-cover lazy_cover"
                                                                     src="http://i.mangaqq.com/ebook/190x247/street-fighter-unlimited_1547963668.jpg?r=r8645456"
                                                                     alt="Street Fighter Unlimited"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/street-fighter-unlimited-6471"
                                    title="Street Fighter Unlimited">Street Fighter Unlimited</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/street-fighter-unlimited-6471-chap-3-5.html">
                                    Chương 3.5</a></div>
                            <div class="more-info">
                                <div class="title-more">Street Fighter Unlimited</div>
                                <div class="title-more-other">Tên khác: Capcom - Udon Entertainment</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 5,434</p>
                                <p class="info">Lượt theo dõi: 14</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                        Arts</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Một thời đại mới, những cuộc quyết chiến mới bùng nổ phá bỏ những
                                    giới hạn cùng series mới từ UDON, với Chúa tể Gill là nhân tố chính tạo ra những cao
                                    trào: Street Fighter Unlimited
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/unfamiliar-6467" title="Unfamiliar"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/unfamiliar_1547954060.jpg?r=r8645456"
                                    alt="Unfamiliar"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/unfamiliar-6467"
                                                      title="Unfamiliar">Unfamiliar</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/unfamiliar-6467-chap-2.html"> Chương 2</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Unfamiliar</div>
                                <div class="title-more-other">Tên khác: Kỳ Lạ</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 2,812</p>
                                <p class="info">Lượt theo dõi: 12</p>
                                <div class="list-tags">
                                    <a class="blue"
                                       href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Cô phù thủy nhỏ Planchette đã quá chán nản với cuộc sống ở ngoại ô,
                                    vậy nên ngay khi nhìn thấy một căn nhà được bán với giá hời trong thị trấn,
                                    Planchette liền hí hửng mua luôn! Vấn đề duy nhất là gì? Căn nhà ấy đầy ma! Với sự
                                    trợ giúp của một nhân ngư nhút nhát, một cô gái bị nguyền rủa và một nàng...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/love-tinh-noi-hoang-da-6428"
                               title="Love - Tình Nơi Hoang Dã"><img class="story-cover lazy_cover"
                                                                     src="http://i.mangaqq.com/ebook/190x247/love-tinh-noi-hoang-da_1547510806.jpg?r=r8645456"
                                                                     alt="Love - Tình Nơi Hoang Dã"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/love-tinh-noi-hoang-da-6428"
                                    title="Love - Tình Nơi Hoang Dã">Love - Tình Nơi Hoang Dã</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/love-tinh-noi-hoang-da-6428-chap-10.html">
                                    Chương 10</a></div>
                            <div class="more-info">
                                <div class="title-more">Love - Tình Nơi Hoang Dã</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,450</p>
                                <p class="info">Lượt theo dõi: 12</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of
                                        Life</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">"Trong vương quốc động vật, các loài vật yêu thương hoặc ghét bỏ
                                    nhau.&nbsp;Yêu và ghét là những điều mang tính đặc thù tự nhiên. một sự cân bằng tối
                                    thượng được nhiều người xem là mang tính phổ quát, thậm chí là linh thiêng, một tình
                                    yêu nguyên sơ.&nbsp;Thứ tình yêu mà nhân loại không bao giờ có thể trải ngh...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/giet-6-ty-con-ac-quy-6414"
                               title="Giết 6 Tỷ Con Ác Quỷ"><img class="story-cover lazy_cover"
                                                                 src="http://i.mangaqq.com/ebook/190x247/giet-6-ty-con-ac-quy_1547290418.jpg?r=r8645456"
                                                                 alt="Giết 6 Tỷ Con Ác Quỷ"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/giet-6-ty-con-ac-quy-6414"
                                                      title="Giết 6 Tỷ Con Ác Quỷ">Giết 6 Tỷ Con Ác Quỷ</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/giet-6-ty-con-ac-quy-6414-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Giết 6 Tỷ Con Ác Quỷ</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 7,498</p>
                                <p class="info">Lượt theo dõi: 28</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                        Arts</a><a class="blue" href="http://truyenqq.com/the-loai/mature-48.html">Mature</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/magic-58.html">Magic</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Câu chuyện về một cô em sinh viên đang chuẩn bị có lần đầu với bạn
                                    trai (nói trắng ra là mất zin đó) thì bị một khứa quái thai nào đó hiển linh bụp một
                                    phát vào đầu và... bay tọt đến một thế giới khác. Mọi chuyện sẽ đi về đâu, với cả cô
                                    em lẫn anh bạn trai?
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/gwenpool-sieu-pham-6368"
                               title="Gwenpool Siêu Phàm"><img class="story-cover lazy_cover"
                                                               src="http://i.mangaqq.com/ebook/190x247/gwenpool-sieu-pham_1546789965.jpg?r=r8645456"
                                                               alt="Gwenpool Siêu Phàm"></a>
                            <div class="top-notice">
                                <span class="time-ago">8 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/gwenpool-sieu-pham-6368"
                                                      title="Gwenpool Siêu Phàm">Gwenpool Siêu Phàm</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/gwenpool-sieu-pham-6368-chap-22.html"> Chương
                                    22</a></div>
                            <div class="more-info">
                                <div class="title-more">Gwenpool Siêu Phàm</div>
                                <div class="title-more-other">Tên khác: The Unbelievable Gwenpool</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 17,337</p>
                                <p class="info">Lượt theo dõi: 71</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/sci-fi-43.html">Sci-Fi</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">Bạn biết Gwen của Spiderverse chứ ? Bạn biết Deadpool chứ?&nbsp;Kết
                                    hợp cả hai lại để tạo thành Gwenpool , là Deadpool phiên bản nữ nhưng năng lực phá
                                    vỡ "Bức tường thứ 4" còn mạnh hơn cả bản gốc, và còn cực kì dễ thương.Gwen Poole là
                                    một cô gái bình thường đến từ vũ trụ của chúng ta, một ngày nọ cô phát...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/batman-ninja-rua-6140" title="Batman - Ninja Rùa"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/batman-ninja-rua_1544402609.jpg?r=r8645456"
                                    alt="Batman - Ninja Rùa"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/batman-ninja-rua-6140"
                                                      title="Batman - Ninja Rùa">Batman - Ninja Rùa</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/batman-ninja-rua-6140-chap-1.html"> Chương
                                    1</a></div>
                            <div class="more-info">
                                <div class="title-more">Batman - Ninja Rùa</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 3,757</p>
                                <p class="info">Lượt theo dõi: 7</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/martial-arts-41.html">Martial
                                        Arts</a><a class="blue"
                                                   href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Sự kiện giao lưu kết hợp từ IDW và DC. Sau chuỗi sự kiện công kích
                                    vào các cơ sở nghiên cứu lớn tại Gotham, Batman và nhóm Ninja Rùa đã có một cuộc
                                    đụng độ mang tính chất "không đánh không quen biết". Và trong lúc phe chính diện còn
                                    kèn cựa nhau bởi những khúc mắc, thì Shredder và hội ác nhân địch t...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/nguoi-doi-tinh-anh-quy-tu-6083"
                               title="Người Dơi: Tinh Anh Quy Tụ"><img class="story-cover lazy_cover"
                                                                       src="http://i.mangaqq.com/ebook/190x247/nguoi-doi-tinh-anh-quy-tu_1543887219.jpg?r=r8645456"
                                                                       alt="Người Dơi: Tinh Anh Quy Tụ"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nguoi-doi-tinh-anh-quy-tu-6083"
                                    title="Người Dơi: Tinh Anh Quy Tụ">Người Dơi: Tinh Anh Quy Tụ</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/nguoi-doi-tinh-anh-quy-tu-6083-chap-1.html">
                                    Chương 1</a></div>
                            <div class="more-info">
                                <div class="title-more">Người Dơi: Tinh Anh Quy Tụ</div>
                                <div class="title-more-other">Tên khác: All-Star Batman</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 2,761</p>
                                <p class="info">Lượt theo dõi: 12</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/mystery-39.html">Mystery</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/tragedy-52.html">Tragedy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Loạt truyện độc đáo với những cái twist khó tưởng, quy tụ Người Dơi
                                    cùng dàn sao phản diện đối trọng được lần lượt thể hiện qua từng Vol, bên cạnh những
                                    trợ thủ mà Bruce chọn lựa để đồng hành đối mặt.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/birthright-6071" title="Birthright"><img
                                    class="story-cover lazy_cover"
                                    src="http://i.mangaqq.com/ebook/190x247/birthright_1543672911.jpg?r=r8645456"
                                    alt="Birthright"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Tháng Trước</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/birthright-6071"
                                                      title="Birthright">Birthright</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/birthright-6071-chap-45.html"> Chương 45</a>
                            </div>
                            <div class="more-info">
                                <div class="title-more">Birthright</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 54,251</p>
                                <p class="info">Lượt theo dõi: 277</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a></div>
                                <div class="excerpt">"Bạn sẽ làm gì khi câu chuyện của bạn kết thúc?" Hẳn là các bạn đã
                                    quá quen thuộc với những câu chuyện về những người hùng, "người được chọn" đi giải
                                    cứu thế giới, hay những chuyến phiêu lưu của những cô cậu bé được du hành về quá khứ
                                    để trở thành vị cứu tinh cho cả một vương quốc. Những chuyến phiê...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item">
                            <a href="http://truyenqq.com/truyen-tranh/hiep-si-arkham-khoi-nguyen-6067"
                               title="Hiệp Sĩ Arkham - Khởi Nguyên"><img class="story-cover lazy_cover"
                                                                         src="http://i.mangaqq.com/ebook/190x247/hiep-si-arkham-khoi-nguyen_1543628168.jpg?r=r8645456"
                                                                         alt="Hiệp Sĩ Arkham - Khởi Nguyên"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span></div>
                            <h3 class="title-book"><a
                                    href="http://truyenqq.com/truyen-tranh/hiep-si-arkham-khoi-nguyen-6067"
                                    title="Hiệp Sĩ Arkham - Khởi Nguyên">Hiệp Sĩ Arkham - Khởi Nguyên</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/hiep-si-arkham-khoi-nguyen-6067-chap-1-2.html">
                                    Chương 1.2</a></div>
                            <div class="more-info">
                                <div class="title-more">Hiệp Sĩ Arkham - Khởi Nguyên</div>
                                <div class="title-more-other">Tên khác: Batman: Arkham Knight - Genesis</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 5,714</p>
                                <p class="info">Lượt theo dõi: 21</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Bộ truyện chuyển thể dựa trên tựa game Arkham Knight, nói về sự
                                    khởi đầu của Jason Todd từ Robin - trợ thủ của Batman trở thành Arkham Knight.
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                    <li>
                        <div class="story-item show-left">
                            <a href="http://truyenqq.com/truyen-tranh/batman-white-knight-6026"
                               title="Batman: White Knight"><img class="story-cover lazy_cover"
                                                                 src="http://i.mangaqq.com/ebook/190x247/batman-white-knight_1543153188.jpg?r=r8645456"
                                                                 alt="Batman: White Knight"></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Năm Trước</span> <span class="type-label hot">Hot</span></div>
                            <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/batman-white-knight-6026"
                                                      title="Batman: White Knight">Batman: White Knight</a></h3>
                            <div class="episode-book"><a
                                    href="http://truyenqq.com/truyen-tranh/batman-white-knight-6026-chap-2-5.html">
                                    Chương 2.5</a></div>
                            <div class="more-info">
                                <div class="title-more">Batman: White Knight</div>
                                <div class="title-more-other">Tên khác: Hiệp Sĩ Minh Bạch</div>
                                <p class="info">Tình trạng: Đang Cập Nhật</p>
                                <p class="info">Lượt xem: 6,359</p>
                                <p class="info">Lượt theo dõi: 20</p>
                                <div class="list-tags">
                                    <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/psychological-40.html">Psychological</a><a
                                        class="blue" href="http://truyenqq.com/the-loai/comic-60.html">Comic</a><a
                                        class="blue"
                                        href="http://truyenqq.com/the-loai/detective-100.html">Detective</a></div>
                                <div class="excerpt">Trong một thế giới mà Joker được dứt bệnh và trở thành người thiện,
                                    còn Batman thì đi quá giới hạn của mình mà không ai ngăn được, cùng với việc Alfred
                                    nằm hấp hối, liệu điều gì sẽ xảy đến với Gotham khi Batman bị bắt giữ và giam lỏng
                                    tại Nhà Thương Điên Arkham, còn Joker lại trở thành Hiệp Sĩ Minh ...
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.list-stories -->

        <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                <li><a class="pagination-link is-current" href="javascript:void(0)">1</a></li>
                <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-2.html">2</a></li>
                <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-3.html">3</a></li>
                <li><a class="pagination-link" href="http://truyenqq.com/the-loai/comic-60/trang-2.html"><span
                            aria-hidden="true">›</span></a></li>
                <li><a class="pagination-next" href="http://truyenqq.com/the-loai/comic-60/trang-3.html"><span
                            aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    </div>
</section>
@include('share.footer')
</body>
