@extends('layout.home')


@section('body-page')
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{!!$title!!}</div>

            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    @if(isset($comics) && count($comics) > 0)
                        <ul class="list-stories grid-6">
                            @foreach($comics as $comic)
                                @include('include.itemview',['hasRemove'=>true, 'comic'=>$comic])
                            @endforeach
                        </ul>
                    @else
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!!</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
