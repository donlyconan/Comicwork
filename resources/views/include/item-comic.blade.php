@php
    /**
    * @var \App\Model\Comicwork $comic
    * @var \App\Model\Chapter
    */

    $id = $comic->id;
    $follows = $comic->follows()->count();
    $views = $comic->views()->count();

    $chapter = $comic->current_chapter ?? $comic->latestChapter() ?? \App\Model\Chapter::find(1);
    $id_chapter = $chapter->id;
    $chapter_number = $chapter->chapter_number;

    //định nghĩa url chuyển hường
    $redirectToInfo = route('comic.info', ['id'=>$id]);
    $redirectToChapter =  route('comic.chapter', ['id'=>$id, 'chapter'=> $id_chapter]);
@endphp


<li>
    <div class="story-item">
        @if(isset($action) && Auth::check())
            <span data-comic="{{$comic->id}}" data-user="{{Auth::id()}}" data-action="{{$action}}"
                  class="remove-subscribe" title="Xoá">
                <i class="far fa-times-circle"></i>
            </span>
        @endif

        <a href="{{ $redirectToInfo }}" title="{{$comic->name}}"><img
                class="story-cover lazy_cover"
                src="{{ $comic->profile() }}" alt="{{$comic->name}}"></a>

        <div class="top-notice">
            <span class="time-ago">{{ $chapter->getTimeAgo() }}</span>

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
                {{'Chương '.($comic->chapter_number ?? $chapter_number) }}</a>
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

            <strong>Tóm tắt:</strong>
            <div class="excerpt">
                {{$comic->description ?? 'Đang cập nhật'}}
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
