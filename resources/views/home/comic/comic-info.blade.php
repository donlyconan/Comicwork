@extends('layout.home')

@php
    /**@var \App\Model\Comicwork $comic; */
    /**@var \App\Model\Chapter $chapter;*/

    $id = $comic->id;
    $created_at = date('d/m/Y', strtotime($comic->created_at));
    $follows = $comic->follows()->count();
    $views = $comic->views()->count();
    $votes = $comic->votes()->count();

    $user = Auth::user();
    $id_user = Auth::check() ? Auth::user()->id : -1;

    $followed = $voted = false;

    if(Auth::check()){
        $followed = $user->hasFollow($id);
        $voted =  $user->hasVote($id);
    }

    $redirectToChapter = route('comic.chapter', ['id'=>$id, 'chapter'=>$chapter->id]);
@endphp


@section('body-page')
    <section class="main-content">
        <div class="container has-background-white story-detail">
            <div id="path">
                <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('homepage') }}">
                            <span itemprop="name">Trang Chủ</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="">
                            <span itemprop="name">{{ $comic->name }}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>
            </div>
            <div class="block01">
                <div class="left">
                    <img src="{{ $comic->profile() }}" alt="{{ $comic->name }}">
                </div>
                <div class="center" itemscope="" itemtype="http://schema.org/Book">
                    <h1 itemprop="name">{{ $comic->name }}</h1>
                    <div class="txt">
                        <p class="info-item">Tác giả:
                            <a class="org"> {{ $comic->author ?? 'Đang Cập Nhật' }} </a>
                        </p>


                        <p class="info-item">
                            Tình trạng: {{!$comic->isUpdating() ? 'Đã Hoàn thành' : 'Đang Cập Nhật'}}</p>

                        <p class="info-item">Quốc gia:
                            <a class="org"> {{ $comic->country()->first()->name ?? 'Đang cập nhật' }} </a></p>


                        <p class="info-item">Năm xuất bản:
                            <a class="org"> {{ date('d-m-Y', strtotime($comic->publishing_year)) }} </a></p>


                        <p class="info-item">Tổng số chương:
                            <a class="org"> {{ $comic->chapters()->count() ?? 'Đang Cập Nhật' }} </a>

                        <div class="statiscal">
                            <span class="st">Lượt xem: </span>
                            <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">
                                        {{ number_format($views) }} {{ "  •  ".$chapter->getTimeAgo() }}
                                </span></span>

                            <span style="margin-left: 25px;">Theo dõi: </span>
                            <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02 number-follow">
                                    {{ number_format($follows) }}
                                </span></span>

                            <span style="margin-left: 25px;">Yêu thích: </span>
                            <span class="sp01"><i class="fas fa-thumbs-up"></i> <span class="sp02 number-like">
                                    {{ number_format($votes) }}
                                </span></span>
                        </div>
                    </div>
                    <ul class="list01">
                        @foreach($comic->tags as $tag)
                            <li class="li03"><a
                                    href="{{ route('home.category', ['id'=> $tag->id]) }}">{{$tag->label}}</a></li>
                        @endforeach
                    </ul>

                    <ul class="story-detail-menu">
                        <li class="li01">
                            <a href="{{ $redirectToChapter }}"
                               class="button is-danger is-rounded"><span
                                    class="btn-read"></span>Đọc từ đầu</a>
                        </li>
                        <li class="li02">
                            <a id="follow" class="button is-danger is-rounded btn-subscribe subscribeBook"
                               data-page="index"
                               data-comic="{{ $comic->id ?? -1 }}"
                               data-user="{{ $id_user ?? -1 }}">
                                {{--                                status fa: heart  - far: no heart--}}
                                {!! $followed ? '<span class="fa fa-heart"></span>Đang theo dõi' : '<span class="far fa-heart"></span>Theo dõi' !!}
                            </a>
                        </li>

                        <li class="li03">
                            <a id="like" class="button is-danger is-rounded btn-like"
                               data-comic="{{ $comic->id ?? -1 }}"
                               data-user="{{ $id_user ?? -1 }}">
                                {!! $voted ? '<span class="fa fa-thumbs-up"></span>Đã thích' : '<span class="far fa-thumbs-up"></span>Thích'   !!}
                            </a>
                        </li>

                    </ul>
                    <div class="txt txt01 story-detail-info" itemprop="description">
                        <h2 style="margin-top: 5px; ">Tóm tắt</h2>
                        <p> {{$comic->description}} </p>
                    </div>
                </div>
            </div>

            <ul class="story-detail-menu">
                <li class="li01">
                    <button
                        class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu
                    </button>
                </li>
                <li class="li02">
                    <button
                        class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index"
                        data-id="4247"><span class="fas fa-heart"></span>Theo dõi
                    </button>
                </li>
                <li class="li03">
                    <button class="button is-danger is-rounded btn-like"
                            data-id="4247"><span class="fas fa-thumbs-up"></span>Thích
                    </button>
                </li>
            </ul>


            <div class="block02">
                <div class="title">
                    <h2 class="story-detail-title">Danh sách chương</h2>
                </div>
                <div class="box">
                    @if(!$listChapters->isEmpty())
                        <div class="works-chapter-list">
                            @foreach($listChapters as $chapter)
                                <div class="works-chapter-item row">
                                    <div class="col-md-10 col-sm-10 col-xs-8 ">
                                        <a target="_blank"
                                           href="{{ route('comic.chapter', ['id'=>$id, 'chapter'=>$chapter->id]) }}">Chương
                                            {{$chapter->chapter_number}}</a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                                        {{date('m/d/Y', strtotime($chapter->release_date))}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="works-chapter-list">
                            <div class="works-chapter-item row">
                                <div class="col-md-10 col-sm-10 col-xs-8 ">
                                    <a target="_blank">Đang cập nhật</a>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                                    {{date('m/d/Y', time())}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="block03">
                <h2 class="story-detail-title">Cùng thể loại</h2>
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <ul class="list-stories grid-6">
                            @each('include.item-comic', $sameKind, 'comic')
                        </ul>
                    </div>
                </div>
            </div>

            <div class="comment-container">
                <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span class="comment-count">{{ $comic->comments()->count() }}</span>)</span>
                <div class="group01 comments-container">
                    <div class="form-comment main_comment">
                        <div class="message-content">
                            <div data-user="{{$id_user}}" data-comic="{{$id}}" class="mess-input">
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
                <div data-from="{{$from}}" data-comic="{{$comic->id}}}" class="load-more load_more_comment"><a
                        class="button is-info">Xem thêm nhiều bình luận</a></div>
            </div>
        </div>
    </section>
@endsection
