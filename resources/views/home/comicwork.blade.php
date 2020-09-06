@extends('layout.master')

@section('body-page')
    <section class="main-content">
        <div class="container has-background-white story-detail">
            <div id="path">
                <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="http://truyenqq.com/index.html">
                            <span itemprop="name">Trang Chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="http://truyenqq.com/truyen-tranh/ayakashiko-4247">
                            <span itemprop="name">Ayakashiko</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>
            </div>
            <div class="block01">
                <div class="left"><img src="http://i.mangaqq.com/ebook/190x247/ayakashiko_1521725604.jpg?r=r8645456"
                                       alt="Ayakashiko"></div>
                <div class="center" itemscope="" itemtype="http://schema.org/Book">
                    <h1 itemprop="name">{{$comic->name}}</h1>
                    <div class="txt">
                        <p class="info-item">Tác giả:
                            <a class="org" href="http://truyenqq.com/tac-gia/dang-cap-nhat-239.html">
                                {{$comic->author != null ? $comic->author : 'Đang Cập Nhật'}}
                            </a></p>
                        <p class="info-item">
                            Tình trạng: {{$comic->status != 0 ? 'Hoàn thành' : 'Đang Cập Nhật'}}</p>
                        <div>
                            <span>Thống kê:</span>
                            <span class="sp01"><i class="fas fa-thumbs-up"></i> <span
                                    class="sp02 number-like">
                                {{number_format($comic->votes->count(), 0, '.', ',')}}
                                </span></span>
                            <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02">
                                    {{number_format($comic->follows->count(), 0, '.', ',')}}
                                </span></span>
                            <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">
                                    {{number_format($comic->views->count(), 0, '.', ',')}}
                                </span></span>
                        </div>
                    </div>
                    <ul class="list01">
                        @foreach($comic->tags as $tag)
                            <li class="li03"><a href="">{{$tag->label}}</a></li>
                        @endforeach
                    </ul>

                    <ul class="story-detail-menu">
                        <li class="li01"><a href="http://truyenqq.com/truyen-tranh/ayakashiko-4247-chap-1.html"
                                            class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                        </li>
                        <li class="li02"><a href="javascript:void(0);"
                                            class="button is-danger is-rounded btn-subscribe subscribeBook"
                                            data-page="index" data-id="4247"><span class="fas fa-heart"></span>Theo dõi</a>
                        </li>
                        <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like"
                                            data-id="4247"><span class="fas fa-thumbs-up"></span>Thích</a></li>
                    </ul>
                    <div class="txt txt01 story-detail-info" itemprop="description">
                        <h2 style="margin-top: 5px; ">Tóm tắt</h2>
                        <p> {{$comic->description}} </p>
                    </div>
                </div>
            </div>
            <ul class="story-detail-menu">
                <li class="li01"><a href="http://truyenqq.com/truyen-tranh/ayakashiko-4247-chap-1.html"
                                    class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                </li>
                <li class="li02"><a href="javascript:void(0);"
                                    class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index"
                                    data-id="4247"><span class="fas fa-heart"></span>Theo dõi</a></li>
                <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like"
                                    data-id="4247"><span class="fas fa-thumbs-up"></span>Thích</a></li>
            </ul>

            <div class="block02">
                <div class="title">
                    <h2 class="story-detail-title">Danh sách chương</h2>
                </div>
                <div class="box">
                    <div class="works-chapter-list">
                        @foreach($comic->chapters as $chapter)
                            <div class="works-chapter-item row">
                                <div class="col-md-10 col-sm-10 col-xs-8 ">
                                    <a target="_blank"
                                       href="http://truyenqq.com/truyen-tranh/ayakashiko-4247-chap-63.html">Chương
                                        {{$chapter->chapter_number}}</a>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                                    {{date('m/d/Y', strtotime($chapter->created_at))}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="block03">
                <h2 class="story-detail-title">Cùng thể loại</h2>
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <ul class="list-stories grid-6">
                            @for($i=1; $i<=6;$i++)
                                @include('include.item')
                            @endfor
                        </ul>
                    </div>
                </div>
                <!-- /.list-stories -->
            </div>
            <div class="comment-container">
            <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span
                    class="comment-count">42</span>)</span>
                <div class="group01 comments-container">
                    <div class="form-comment main_comment">
                        <div class="message-content">
                            <img src="image/avatar.png" alt="">
                            <div class="mess-input">
                                <b id="full_name">Donly Conan</b>
                                <textarea style="margin-top: 5px;" class="textarea" placeholder="Nội dung bình luận"
                                          id="content_comment"></textarea>
                                <button style="margin-top: 30px;" type="submit" class="submit_comment"></button>
                            </div>
                        </div>
                    </div>

                    <div class="list-comment">
                        <article class="info-comment child_1036934 parent_0 comment-main-level">
                            <div class="outsite-comment comment-main-level">
                                <figure class="avartar-comment">
                                    <img src="http://avatar.mangaqq.com/160x160/avatar_1597853743.jpg?r=r8645456"
                                         alt="Teri">
                                </figure>
                                <div class="item-comment">
                                    <div class="outline-content-comment">
                                        <div>
                                            <strong>Teri</strong><span
                                                class="title-user-comment title-member">Thành Viên</span>
                                            <span class="time">5 Ngày Trước</span>
                                        </div>
                                        <div class="content-comment">
                                            <strong></strong> terí
                                        </div>
                                    </div>
                                    <div class="action-comment">
                                    <span class="like-comment" data-id="1036934"><i class="fas fa-thumbs-up"></i> <span
                                            class="total-like-comment">0</span></span>
                                        <span class="reply-comment" data-parent="0" data-id="1036934" data-user="192648"
                                              data-replyname="Teri"><i class="far fa-comment"></i> Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <article class="info-comment child_1041820 parent_1036934 reply-list">
                            <div class="outsite-comment reply-list">
                                <figure class="avartar-comment">
                                    <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png"
                                         alt="Loichoi">
                                </figure>
                                <div class="item-comment">
                                    <div class="outline-content-comment">
                                        <div>
                                            <strong>Loichoi</strong><span
                                                class="title-user-comment title-member">Thành Viên</span>
                                            <span class="time">3 Ngày Trước</span>
                                        </div>
                                        <div class="content-comment">
                                            <strong>Teri</strong> Terí terì
                                        </div>
                                    </div>
                                    <div class="action-comment">
                                    <span class="like-comment" data-id="1041820"><i class="fas fa-thumbs-up"></i> <span
                                            class="total-like-comment">0</span></span>
                                        <span class="reply-comment" data-parent="1036934" data-id="1041820"
                                              data-user="213077" data-replyname="Loichoi"><i class="far fa-comment"></i> Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="info-comment child_1041822 parent_1036934 reply-list">
                            <div class="outsite-comment reply-list">
                                <figure class="avartar-comment">
                                    <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png"
                                         alt="Loichoi">
                                </figure>
                                <div class="item-comment">
                                    <div class="outline-content-comment">
                                        <div>
                                            <strong>Loichoi</strong><span
                                                class="title-user-comment title-member">Thành Viên</span>
                                            <span class="time">3 Ngày Trước</span>
                                        </div>
                                        <div class="content-comment">
                                            <strong>Teri</strong> Terí terì
                                        </div>
                                    </div>
                                    <div class="action-comment">
                                    <span class="like-comment" data-id="1041822"><i class="fas fa-thumbs-up"></i> <span
                                            class="total-like-comment">0</span></span>
                                        <span class="reply-comment" data-parent="1036934" data-id="1041822"
                                              data-user="213077" data-replyname="Loichoi"><i class="far fa-comment"></i> Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="info-comment child_1046216 parent_1036934 reply-list">
                            <div class="outsite-comment reply-list">
                                <figure class="avartar-comment">
                                    <img src="http://avatar.mangaqq.com/160x160/avatar_1593547391.jpg?r=r8645456"
                                         alt="clgt">
                                </figure>
                                <div class="item-comment">
                                    <div class="outline-content-comment">
                                        <div>
                                            <strong>clgt</strong><span
                                                class="title-user-comment title-member">Thành Viên</span>
                                            <span class="time">22 Giờ Trước</span>
                                        </div>
                                        <div class="content-comment">
                                            <strong>Teri</strong> sao lại gặp honkaibu ở đêy thế này \'-\')
                                        </div>
                                    </div>
                                    <div class="action-comment">
                                    <span class="like-comment" data-id="1046216"><i class="fas fa-thumbs-up"></i> <span
                                            class="total-like-comment">0</span></span>
                                        <span class="reply-comment" data-parent="1036934" data-id="1046216"
                                              data-user="108239" data-replyname="clgt"><i class="far fa-comment"></i> Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="info-comment child_1036861 parent_0 comment-main-level">
                            <div class="outsite-comment comment-main-level">
                                <figure class="avartar-comment">
                                    <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png"
                                         alt="Namae">
                                </figure>
                                <div class="item-comment">
                                    <div class="outline-content-comment">
                                        <div>
                                            <strong>Namae</strong><span
                                                class="title-user-comment title-hidden">Ẩn Danh</span>
                                            <span class="time">5 Ngày Trước</span>
                                        </div>
                                        <div class="content-comment">
                                            <strong></strong> cuteee, loli cũng có , moe nữa :))
                                        </div>
                                    </div>
                                    <div class="action-comment">
                                    <span class="like-comment" data-id="1036861"><i class="fas fa-thumbs-up"></i> <span
                                            class="total-like-comment">0</span></span>
                                        <span class="reply-comment" data-parent="0" data-id="1036861" data-user="0"
                                              data-replyname="Namae"><i class="far fa-comment"></i> Trả lời</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="load-more load_more_comment"><a class="button is-info">Xem thêm nhiều bình luận</a></div>
            </div>
        </div>
    </section>
@endsection
