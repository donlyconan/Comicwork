@extends('layout.master')

@section('body-page')
    <section class="main-content">
        <div class="container story-list">

            @if(isset($title))
                <div class="title-list">{{$title}}</div>
            @endif

            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    <ul class="list-stories grid-6">
                        @for($i = 1; $i < 6; $i++)
                            @include('include.item', ['isViewList'=>true])
                        @endfor
                    </ul>
                </div>
            </div>
            <!-- /.list-stories -->

        </div>
    </section>

@endsection
