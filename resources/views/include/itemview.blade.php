@php
    /**
    *@var \App\Model\Comicwork $comic
    *@ClassName Comicwork
    */
    $id = $comic->id;
    $follows = $comic->countFollows();
    $views = $comic->countViews();
    $chapter = $comic->currentChapter();

    //định nghĩa url chuyển hường
    $redirectToInfo = route('comicwork.info', ['id'=>$id]);
    $redirectToChapter =  route('comiwork.chapter', ['id'=>$id, 'chapter'=> $chapter]);
@endphp


<li>

    <div class="story-item">
        @isset( $hasRemove )
        <span class="remove-subscribe" title="Xoá">
                <i class="far fa-times-circle"></i>
            </span>
        @endisset

        <a href="{{ $redirectToInfo }}" title="{{$comic->name}}"><img
                class="story-cover lazy_cover"
                src="{{ $comic->profile() }}" alt="Đảo Hải Tặc"></a>

        <div class="top-notice">
            <span class="time-ago">{{ $comic->getTimeAgo() }}</span>

            @isset($status, $title)
                <span class="type-label {{$status}}">{{$title}}</span>
            @endif
        </div>

        <h3 class="title-book">
            <a href="{{ $redirectToInfo }}" title="{{$comic->name}}"
               title="{{ $comic->name }}">{{ $comic->name }}</a>
        </h3>
        <div class="episode-book">
            <a href="{{ $redirectToChapter }}">
                {{'Chương '.$chapter}}</a>
        </div>

        <div class="more-info">
            <div class="title-more" style="margin-bottom: 5px;">{{$comic->name}}</div>
            <p class="info">Tình trạng: {{$comic->isUpdating() ? 'Đang cập nhật' : 'Đã hoàn thành'}}</p>
            <p class="info">Lượt xem: {{ $views }}</p>
            <p class="info">Lượt theo dõi: {{ $follows }}</p>

            <div class="list-tags">
                @foreach($comic->tags as $tag)
                    <a class="blue" href="{{ route('home.category', ['id'=>$tag->id]) }}">{{$tag->label}}</a>
                @endforeach
            </div>

            <h2><b>Mô tả:</b></h2>
            <div class="excerpt">
                {{$comic->description}}
            </div>
        </div>

    </div>
</li>

<style>
    .excerpt {
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 150px;
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
    }
</style>
