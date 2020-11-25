
{{--<style>--}}
{{--    .container img {--}}
{{--        object-fit: fill;--}}
{{--    }--}}
{{--</style>--}}


<div class="container">
    <div class="tile is-ancestor">
        <div class="tile is-0-fullhd is-vertical is-parent">
            <div class="tile is-child">
                <a href="{{$topComic->lup->url}}">
                    <div class="hero-item">
                        <img class="cover" src="{{$topComic->lup->url_image}}" alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h3>{{$topComic->lup->name}}</h3>
                        </div>
                        <div class="chapter violet">Chương {{$topComic->lup->chapter}}</div>
                    </div>
                </a>
            </div>
            <div class="tile is-0-fullhd is-child">
                <a href="{{$topComic->ldown->url}}">
                    <div class="hero-item">
                        <img class="cover" src="{{$topComic->ldown->url_image}}"
                             alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h3>{{$topComic->ldown->name}}</h3>
                        </div>
                        <div class="chapter orange">Chương {{$topComic->ldown->chapter}}</div>
                    </div>
                    <!-- /.hero-item -->
                </a>
            </div>
        </div>
        <div class="tile is-parent">
            <div class="tile is-child">
                <a href="{{$topComic->center_1->url}}">
                    <div class="hero-item has-excerpt">
                        <img style="object-fit: fill;" class="cover" src="{{$topComic->center_1->url_image}}"
                             alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h5>Thể loại: {{$topComic->center_1->tags}}</h5>
                            <h3>{{$topComic->center_1->name}}</h3>
                        </div>
                        <div class="chapter green">Chương {{$topComic->center_1->chapter}}</div>
                        <div class="excerpt">{{$topComic->center_1->description}}
                        </div>
                    </div>
                    <!-- /.hero-item -->
                </a>
            </div>
        </div>

        <div class="tile is-parent">
            <div class="tile is-child">
                <a href="{{$topComic->center_2->url}}">
                    <div class="hero-item has-excerpt">
                        <img style="object-fit: fill;" class="cover" src="{{$topComic->center_2->url_image}}"
                             alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h5>Thể loại: {{$topComic->center_2->tags}}</h5>
                            <h3>{{$topComic->center_2->name}}</h3>
                        </div>
                        <div class="chapter green">Chương {{$topComic->center_2->chapter}}</div>
                        <div class="excerpt">{{$topComic->center_2->description}}
                        </div>
                    </div>
                    <!-- /.hero-item -->
                </a>
            </div>
        </div>

        <div class="tile is-3 is-vertical is-parent">
            <div class="tile is-child">
                <a href="{{$topComic->rup->url}}">
                    <div class="hero-item">
                        <img class="cover" src="{{$topComic->rup->url_image}}"
                             alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h3>{{$topComic->rup->name}}</h3>
                        </div>
                        <div class="chapter blue">Chương {{$topComic->rup->chapter}}</div>
                    </div>
                    <!-- /.hero-item -->
                </a>
            </div>

            <div class="tile is-child">
                <a href="{{$topComic->rdown->url}}">
                    <div class="hero-item">
                        <img class="cover" src="{{$topComic->rdown->url_image}}"
                             alt="cover">
                        <div class="bottom-shadow"></div>
                        <div class="captions">
                            <h3>{{$topComic->rup->name}}</h3>
                        </div>
                        <div class="chapter red">Chương {{$topComic->rup->chapter}}</div>
                    </div>
                    <!-- /.hero-item -->
                </a>
            </div>
        </div>
    </div>
</div>
