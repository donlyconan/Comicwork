@extends('layout.master')

@section('body-page')
    <section class="main-content">
        <div class="container story-list">
            <div class="title-list">{!!$title!!}</div>

            @if(count($comics) > 0)
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <ul class="list-stories grid-6">
                            @for($i = 1; $i < 6; $i++)
                                @include('include.item', ['isViewList'=>true])
                            @endfor
                        </ul>
                    </div>
                </div>
            @else
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-parent">
                        <div class="warning-list box">Xin lỗi, không tìm thấy kết quả nào!!</div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
