@extends('layout.home')

@section('body-page')
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{{$title}}</div>

            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    @if(isset($comics) && count($comics) > 0)
                        <ul class="list-stories grid-6">
                            @foreach($comics as $comic)
                                @if(isset($comic->current_chapter))
                                    @include('include.item-comic', [
                                        'comic'=>$comic,
                                        'id_chapter'=>$comic->current_chapter->id,
                                        'chapter_number'=>$comic->current_chapter->chapter_number
                                    ])
                                @elseif(isset($action))
                                    @include('include.item-comic', compact('comic', 'action'))
                                @else
                                    @include('include.item-comic', compact('comic'))
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <div class="warning-list box">{{$notify ?? 'Xin lỗi, không tìm thấy kết quả nào!!'}}</div>
                    @endif
                </div>
            </div>

            @includeIf('include.pageinate', compact('comics'))
        </div>
    </section>
@endsection
