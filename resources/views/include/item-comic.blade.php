<li>
    <div class="story-item">
        @if(isset($action) && Auth::check())
            <span data-comic="{{$comic->id}}" data-user="{{Auth::id()}}" data-action="{{$action}}"
                  class="remove-subscribe" title="Xoá">
                <i class="far fa-times-circle"></i>
            </span>
        @endif

        <a href="{{ route('comic.info', ['id'=>$comic->id]) }}" title="{{$comic->name}}">
            <img style="object-fit: cover; height: 290px;" class="story-cover lazy_cover"
                 src="{{ $comic->profile() }}" alt="{{$comic->name}}"></a>

        <div class="top-notice">
            <span class="time-ago">{{$comic->latest()->getTimeAgo()}}</span>

            @isset($status, $title)
                <span class="type-label {{$status}}">{{$title}}</span>
            @endif
        </div>

        <h3 class="title-book">
            <a href="{{ route('comic.info', ['id'=>$comic->id]) }}" title="{{$comic->name}}"
               title="{{ $comic->name }}">{{ $comic->name }}</a>
        </h3>
        <div class="episode-book">
            <a href="{{ route('comic.chapter', ['id'=>$comic->id, 'chapter'=>$id_chapter ?? $comic->latest()->id]) }}">
                Chương {{$chapter_number ?? $comic->latest()->chapter_number}}
            </a>
        </div>

        <div class="more-info">
            <div class="title-more" style="margin-bottom: 5px;">{{$comic->name}}</div>
            <p class="info">Tình trạng: {{$comic->isUpdating() ? 'Đang cập nhật' : 'Đã hoàn thành'}}</p>
            <p class="info">Lượt xem: {{ $comic->views()->count() }}</p>
            <p class="info">Lượt theo dõi: {{ $comic->follows()->count() }}</p>

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
