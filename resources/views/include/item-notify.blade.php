<li class="message {{$notify->seen ? '' : 'unread'}}">
    <a href="{{$notify->url}}">
        <div class="notify-left">
            <div class="content-message-item">
                {!!$notify->content!!}
            </div>
            <p class="time"><i class="far fa-clock">
                </i>{{$notify->time}}</p>
        </div>
    </a>
</li>
