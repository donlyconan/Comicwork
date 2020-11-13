<div class="result-item">
    <a href="{{$item->url}}">
        <div class="media">
            <figure class="media-left">
                <p class="image" style="width: 50px; height: 50px;">
                    <img src="{{$item->url_image}}"
                         alt="Đảo Hải Tặc">
                </p>
            </figure>
            <div class="media-content">
                <b>{{$item->name}}</b>
                <p style="font-size: 13px;">Lượt xem: {{$item->views}}</p>
            </div>
        </div>
    </a>
</div>
