@extends('layout.home')


@section('nominations')
    <div class="hero">
        @includeIf('include.nominations')
    </div>
@endsection

@section('body-page')
    <div class="outsite ">
        @if(!$release->isEmpty())
            <section class="schedule">
                <div class="container">
                    <div class="schedule-inner">
                        <div class="time">
                            Lịch Ra Mắt Truyện Ngày {{date('d/m/Y', time())}}
                        </div>
                        <ul class="schedule-list">
                            @foreach($release as $item)
                                <li>
                                    <a href="{{route('comic.info', ['id'=>$item->id_comicwork])}}">
                                        <strong class="{{$item->isPublished() ? 'hot' : ''}}">
                                            {{"[{$item->asHour()}]"}}
                                        </strong>
                                        {{$item->comicwork()->first()->name}} - Chương {{$item->chapter_number}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif


        <section class="main-content index">
            <div class="container">
                <div class="latest">
                    <div class="caption" id="list-update">
                        <a href=#"">
                            <span class="starts-icon"></span>Truyện mới cập nhật
                        </a>
                    </div>
                    <ul class="list-stories grid-6">
                        @foreach($topUpdate as $item)
                            @include('include.item-comic', [
                                'comic'=>$item, 'status'=>'new', 'title'=>'New'
                            ])
                        @endforeach
                    </ul>
                    {{--                    <div class="has-text-centered">--}}
                    {{--                        <a href="" class="view-more-btn">Xem thêm</a>--}}
                    {{--                    </div>--}}
                </div>

                @if(!$topView->isEmpty())
                    <div class="latest">
                        <div class="caption" id="list-update">
                            <a href="#">
                                <span class="starts-icon"></span>Truyện thịnh hành</a>
                        </div>
                        <ul class="list-stories grid-6">
                            @foreach($topView as $item)
                                @include('include.item-comic',[
                                    'comic' => $item,
                                    'status' => 'hot',
                                    'title' => 'Trending',
                                    'chapter' => $item->current_chapter,
                                    'numberOfViews' => $item->views
                                 ])
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="latest">
                    <div class="caption" id="list-update">
                        <a href="#">
                            <span class="starts-icon"></span>Truyện yêu thích
                        </a>
                    </div>
                    <ul class="list-stories grid-6">
                        @foreach($topFav as $item)
                            @include('include.item-comic',[
                                'comic'=>$item, 'status'=>'hot', 'title'=>'Hot'
                             ])
                        @endforeach
                    </ul>
                </div>
            </div>

            <div id="Top" class="scrollTop none" style="display: none;">
                <span>
                    <a href="javascript:void(0);">
                        <img src="{{asset('image/icon.png')}}">
                    </a>
                </span>
            </div>
        </section>
@endsection
