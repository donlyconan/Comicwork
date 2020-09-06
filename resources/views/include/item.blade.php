<li>
    <div class="story-item">
        @if(isset($isViewList) && $isViewList)
            <span class="remove-subscribe" title="Xóa" data-id="128">
            <i class="far fa-times-circle"></i></span>
        @endif

        <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128" title="Đảo Hải Tặc"><img
                class="story-cover lazy_cover"
                src="http://i.mangaqq.com/ebook/190x247/dao-hai-tac_1552224567.jpg?r=r8645456" alt="Đảo Hải Tặc"></a>
        <div class="top-notice">
            <span class="time-ago">20 phút Trước</span>

            @if(!isset($isViewList) || !$isViewList)
                <span class="type-label hot">Hot</span>
            @endif
        </div>
        <h3 class="title-book">
            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128" title="Đảo Hải Tặc">Đảo Hải Tặc</a>
        </h3>
        <div class="episode-book">
            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128-chap-989.html"> Đọc Tiếp Chương 989</a>
        </div>

        <div class="more-info">
            <div class="title-more" style="margin-bottom: 5px;">Đảo Hải Tặc</div>
            <p class="info">Tình trạng: Đang Cập Nhật</p>
            <p class="info">Lượt xem: 199,094,989</p>
            <p class="info">Lượt theo dõi: 83,560</p>

            <div class="list-tags">
                <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue"
                                                                                                href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a
                    class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue"
                                                                                                 href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a
                    class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue"
                                                                                                   href="http://truyenqq.com/the-loai/shounen-31.html">Shounen</a><a
                    class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a>
            </div>

            <h2><b>Mô tả:</b></h2>
            <div class="excerpt">One Piece là câu truyện kể về Luffy và các thuyền viên của mình.
                Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé thay đổi khi
                cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại, cậu không bao
                giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc...
            </div>
        </div>
    </div>
</li>

{{--<li>--}}
{{--    {{--}}
{{--        $chapter = $comic->chapters->orderBy('chapter_number', 'desc')->first()--}}
{{--    }}--}}

{{--    <div class="story-item">--}}
{{--        @if(isset($isViewList) && $isViewList)--}}
{{--            <span class="remove-subscribe" title="Xóa" data-id="128">--}}
{{--            <i class="far fa-times-circle"></i></span>--}}
{{--        @endif--}}

{{--        <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128" title="Đảo Hải Tặc"><img--}}
{{--                class="story-cover lazy_cover"--}}
{{--                src="http://i.mangaqq.com/ebook/190x247/dao-hai-tac_1552224567.jpg?r=r8645456" alt="Đảo Hải Tặc"></a>--}}
{{--        <div class="top-notice">--}}
{{--            <span class="time-ago">{{\App\Model\Comicwork::timeToStr($chapter->updated_at)}} Trước</span>--}}

{{--            @if(!isset($isViewList) || !$isViewList && strtotime($chapter->updated_at) < \App\Model\Comicwork::HOUR)--}}
{{--                <span class="type-label hot">Hot</span>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <h3 class="title-book">--}}
{{--            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128" title="Đảo Hải Tặc">Đảo Hải Tặc</a>--}}
{{--        </h3>--}}
{{--        <div class="episode-book">--}}
{{--            <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128-chap-989.html"> Đọc Tiếp Chương 989</a>--}}
{{--        </div>--}}

{{--        <div class="more-info">--}}
{{--            <div class="title-more" style="margin-bottom: 5px;">Đảo Hải Tặc</div>--}}
{{--            <p class="info">Tình trạng: Đang Cập Nhật</p>--}}
{{--            <p class="info">Lượt xem: 199,094,989</p>--}}
{{--            <p class="info">Lượt theo dõi: 83,560</p>--}}

{{--            <div class="list-tags">--}}
{{--                <a class="blue" href="http://truyenqq.com/the-loai/action-26.html">Action</a><a class="blue"--}}
{{--                                                                                                href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue"--}}
{{--                                                                                                 href="http://truyenqq.com/the-loai/drama-29.html">Drama</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a class="blue"--}}
{{--                                                                                                   href="http://truyenqq.com/the-loai/shounen-31.html">Shounen</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/supernatural-32.html">Supernatural</a>--}}
{{--            </div>--}}

{{--            <h2><b>Mô tả:</b></h2>--}}
{{--            <div class="excerpt">One Piece là câu truyện kể về Luffy và các thuyền viên của mình.--}}
{{--                Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé thay đổi khi--}}
{{--                cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại, cậu không bao--}}
{{--                giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc...--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</li>--}}

{{--<li>--}}
{{--    <div class="story-item">--}}
{{--        <a href="http://truyenqq.com/truyen-tranh/ma-vuong-that-nghiep-9800"--}}
{{--           title="Title"><img class="story-cover lazy_cover"--}}
{{--                                         src="Defualt"--}}
{{--                                         alt="Dsds"></a>--}}
{{--        <div class="top-notice">--}}
{{--            <span class="time-ago">8 Phút Trước</span>--}}
{{--            <span class="type-label hot">Hot</span></div>--}}
{{--        <h3 class="title-book"><a href="http://truyenqq.com/truyen-tranh/ma-vuong-that-nghiep-9800"--}}
{{--                                  title="Ma Vương Thất Nghiệp">Ma Vương Thất Nghiệp</a></h3>--}}
{{--        <div class="episode-book"><a--}}
{{--                href="http://truyenqq.com/truyen-tranh/ma-vuong-that-nghiep-9800-chap-103.html">--}}
{{--                Chương 103</a></div>--}}
{{--        <div class="more-info">--}}
{{--            <div class="title-more">Ma Vương Thất Nghiệp</div>--}}
{{--            <p class="info">Tình trạng: Đang Cập Nhật</p>--}}
{{--            <p class="info">Lượt xem: 627,687</p>--}}
{{--            <p class="info">Lượt theo dõi: 2,590</p>--}}
{{--            <div class="list-tags">--}}
{{--                <a class="blue"--}}
{{--                   href="http://truyenqq.com/the-loai/adventure-27.html">Adventure</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/fantasy-30.html">Fantasy</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/manhua-35.html">Manhua</a><a--}}
{{--                    class="blue" href="http://truyenqq.com/the-loai/truyen-mau-92.html">Truyện--}}
{{--                    Màu</a></div>--}}
{{--            <div class="excerpt">Ma vương "nguy hiểm" thất nghiệp gặp nữ hiệp xinh đẹp, oan gia ngõ--}}
{{--                hẹp cùng nhau lang thang... í lộn... phải nói là "nhân duyên kỳ ngộ cùng nhau phiêu--}}
{{--                lưu" cho nó sang. Truyện này raw ra chậm nên ad đợi nhiều rồi dịch luôn, đỡ mất công--}}
{{--                đang hay lại phải đợi, đợi đến chap mới lại quên mất chap cũ nói...--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</li>--}}
