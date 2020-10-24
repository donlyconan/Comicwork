@extends('layout.home')

@php
    /**@var \App\Model\Chapter $chapter;*/
    $urlhome = route('homepage');
    $comic = $chapter->comicwork()->first();
    $user = Auth::user();
    $followed = $voted = false;

    if(Auth::check()){
        $followed = $user->hasFollow($comic->id);
        $voted =  $user->hasVote($comic->id);
    }

    $nextChap = $chapter->next();
    $prevChap = $chapter->previous();

    $urlNextChap = $nextChap == null ? null : route('comic.chapter', ['id'=>$nextChap->id_comicwork, 'chapter'=> $nextChap->id]);
    $urlPrevChap = $prevChap == null ? null : route('comic.chapter', ['id'=>$prevChap->id_comicwork, 'chapter'=> $prevChap->id]);

    //dd($urlNextChap, $urlPrevChap)
@endphp

@section('body-page')
    <section class="main-content on">
        <div style="height: 20px"></div>
        <div class="story-see container">
            <div class="story-see-main">
                <div class="block">
                    <div class="box">
                        <div id="path" class="path-top">
                            <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="{{ $urlhome }}">
                                        <span itemprop="name">Trang Chủ</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item">
                                        <span itemprop="name">{{$chapter->comicwork()->first()->name}}</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item">
                                        <span itemprop="name">Chap {{$chapter->chapter_number}}</span>
                                    </a>
                                    <meta itemprop="position" content="3">
                                </li>
                            </ol>
                        </div>
                        <div>
                            <h1 class="detail-title"><a
                                    href="">{{$chapter->comicwork()->first()->name}}</a>
                                Chap {{$chapter->chapter_number}}</h1>
                            <time datetime="2019-07-18T05:14:23+07:00">(Cập nhật
                                lúc: {{date('d-m-Y h:m', strtotime($chapter->release_date))}})
                            </time>
                        </div>
                        <div class="chapter-control">

                            <div class="alert alert-info hidden-xs hidden-sm align-items-center">
                                <i class="fa fa-info-circle"></i> <em>Sử dụng mũi tên trái (←) hoặc phải (→) để chuyển
                                    chapter</em>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn {{$urlPrevChap != null ? '' : 'disabled'}} btn-info go-btn prev text-white m-1 d-block"
                                   href="{{$urlPrevChap ?? '#'}}">
                                    <em class="fa fa-arrow-left"></em> Chap trước</a>
                                <a class="btn {{$urlNextChap != null ? '' : 'disabled'}} btn-info go-btn prev text-white m-1 d-block"
                                   href="{{$urlNextChap ?? '#'}}">Chap sau <em class="fa fa-arrow-right"></em></a>


                            </div>
                        </div>
                    </div>

                    {{--                    render image--}}
                    <div class="story-see-content">
                        @forelse($images as $image)
                            <img class="lazy" src="{{$image->url()}}" alt="Loading..."><br>
                        @empty
                            <div class="box">
                                <p>Xin lỗi! Chương hiện tại chưa được cập nhật</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="show-footer"></div>

                    <div class="story-detail has-background-white on">
                        <div id="path">
                            <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="">
                                        <span itemprop="name">Trang Chủ</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item"
                                       href="{{route('comic.info', ['id'=>$chapter->id_comicwork])}}">
                                        <span itemprop="name">{{$chapter->comicwork()->first()->name}}</span>
                                    </a>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ol>
                        </div>


                        {{--                        <div class="comment-container">--}}
                        {{--                            <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span--}}
                        {{--                                    class="comment-count">{{13}}</span>)</span>--}}

                        {{--                            <div class="group01 comments-container">--}}
                        {{--                                <div class="form-comment main_comment">--}}
                        {{--                                    <div class="message-content">--}}
                        {{--                                        <div class="mess-input">--}}
                        {{--                                            <textarea class="textarea" placeholder="Nội dung bình luận"--}}
                        {{--                                                      id="content_comment">--}}
                        {{--                                            </textarea>--}}
                        {{--                                            <button type="submit" class="submit_comment"></button>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                @includeIf('include.list-comments')--}}
                        {{--                            </div>--}}
                        {{--                            <div class="load-more load_more_comment"><a class="button is-info">Xem thêm nhiều bình--}}
                        {{--                                    luận</a></div>--}}
                        {{--                        </div>--}}

                        <div class="comment-container">
                            <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span
                                    class="comment-count">{{ $comic->comments()->count() }}</span>)</span>
                            <div class="group01 comments-container">
                                <div class="form-comment main_comment">
                                    <div class="message-content">
                                        <div data-user="{{Auth::id()}}" data-comic="{{$comic->id}}" class="mess-input">
                                <textarea class="textarea" placeholder="Nội dung bình luận"
                                          id="content_comment"></textarea>
                                            <button type="submit" class="submit_comment"></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-comment">
                                    @foreach($comments as $comment)
                                        @include('include.item-comment', compact('owner', 'comment'))
                                    @endforeach
                                </div>
                                {{--                    @includeIf('include.list-comments')--}}

                            </div>
                            <div data-from="{{$from}}" data-comic="{{$comic->id}}}" class="load-more load_more_comment">
                                <a
                                    class="button is-info">Xem thêm nhiều bình luận</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="stop" class="scrollTop" style="display: none; bottom: 60px;">
                <span><a href=""><img
                            src="http://static.truyenqq.com/template/frontend/images/back-to-top-icon.png"></a></span>
            </div>
        </div>
    </section>

    <section id="section_bottom_bar" class="story-see-footer has-background-white on">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <ul class="list-01">
                        <li><a class="" href="{{route('homepage')}}"><i class="fas fa-home"></i> <span
                                    class="control-see">Trang chủ</span></a></li>
                        <li><a class="btn-like" href="javascript:void(0);" id="faul"
                               data-comic="{{ $chapter->id_comicwork  }}"
                               data-user="{{ \Auth::id() }}">
                                {!! $voted ? '<span class="fa fa-thumbs-up"> </span> Đã thích' : '<span class="far fa-thumbs-up"></span> Thích'   !!}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="center level">
                    <div class="prev level-left">
                        <a class="{{$urlPrevChap != null ? 'link-prev-chap' : 'disable'}}"
                           href="{{$urlPrevChap ?? '#'}}">
                            <i class="fas fa-arrow-circle-left"></i></a>
                    </div>


                    <select onchange="location.href = this.value" class="selectEpisode">
                        @foreach($listChapter as $item)
                            <option  value="{{route('comic.chapter', ['id'=>$comic->id, 'chapter'=>$item->id])}}"
                                {{$item->chapter_number == $chapter->chapter_number ? 'selected' : ''}}>
                                Chương {{ $item->chapter_number }}
                            </option>
                        @endforeach
                    </select>
                    <div class="next level-right">
                        <a class="{{$urlNextChap != null ? 'link-next-chap' : 'disable'}}"
                           href="{{$urlNextChap ?? '#'}}">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="level-right">
                    <ul class="list-01">
                        <li><a class="light-see" href="javascript:void(0);"><i class="fas fa-lightbulb"></i>
                                <span class="control-see">Bật đèn</span></a></li>
                        <li><a class="subscribeBook" href="javascript:void(0);"
                               data-user="{{Auth::id()}}"
                               data-comic="{{$chapter->id_comicwork}}">
                                {!! $followed ? '<span class="fa fa-heart"></span> Đang theo dõi' : '<span class="far fa-heart"></span> Theo dõi' !!}
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

