@extends('admin.layouts.admin-master')

@section('title')
    <title>Show Comicworks</title>
@endsection

@section('css')
{{--    <link href="{{ asset('admins/comicworks/show.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Comicworks', 'action' => 'Show', 'route' => 'http://127.0.0.1:8000/admin/comicworks/index'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="">
                                    <img class="show-img-profile"
                                         src="{{\App\MyStorage\FileSystem::asset($comicwork->url_image) }}"
                                         alt="{{$comicwork->name}}">
                                </div>
                                <hr>
                                <div class="text-center card-primary">
                                    <h5><strong>{{$comicwork->name}}</strong></h5>
                                </div>
                                <hr>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Comicwork Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-user mr-1"></i> Author</strong>

                                <p class="text-muted">
                                    {{$comicwork->author}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Country</strong>

                                <p class="text-muted">{{$comicwork->country->name}}</p>

                                <hr>

                                <strong><i class="fas fa-building mr-1"></i> Publishing Company</strong>

                                <p class="text-muted">
                                    {{$comicwork->publishing_company}}
                                </p>

                                <hr>

                                <strong><i class="far fa-calendar mr-1"></i> Publishing Year</strong>

                                <p class="text-muted">
                                    {{$comicwork->publishing_year}}
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card card-primary card-outline">

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <ul class="list-group list-group mb-3">
                                            <li class="list-group-item">
                                                <b>Description</b>
                                                <p>{{$comicwork->description}}</p>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Tags</b>
                                                <p>
                                                    @foreach($comicwork->tags as $tagItem)
                                                        <span class="badge badge-success">{{$tagItem->label}}</span>
                                                    @endforeach
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Following</b>
                                                <b class="float-right">{{number_format($comicwork->follows->count())}}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Views</b> <b class="float-right">{{number_format($comicwork->views->count())}}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Votes</b> <b class="float-right">{{number_format($comicwork->votes->count())}}</b>
                                            </li>
                                        </ul>

                                        <!-- Post -->
                                        <div class="post">
                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Preview</h3>
                            </div>
                            @if(count($images->all()) > 0)
                                <div class="card-body ">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <img class="img-fluid show-img-preview" src="{{asset($images[0]->url_image)}}"
                                                 alt="{{$comicwork->name}}">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="row">
                                                @if(count($images->all()) > 2)
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3 show-img-preview"
                                                             src="{{asset($images[1]->url_image)}}"
                                                             alt="{{$comicwork->name}}">
                                                        <img class="img-fluid show-img-preview"
                                                             src="{{asset($images[2]->url_image)}}"
                                                             alt="{{$comicwork->name}}">
                                                    </div>

                                                    <!-- /.col -->
                                                    @if(count($images->all()) > 4)
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3 show-img-preview"
                                                                 src="{{asset($images[3]->url_image)}}"
                                                                 alt="{{$comicwork->name}}">
                                                            <img class="img-fluid show-img-preview"
                                                                 src="{{asset($images[4]->url_image)}}"
                                                                 alt="{{$comicwork->name}}">
                                                        </div>
                                                        <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="row">
                                                @if(count($images->all()) > 6)
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3 show-img-preview"
                                                             src="{{asset($images[5]->url_image)}}"
                                                             alt="{{$comicwork->name}}">
                                                        <img class="img-fluid show-img-preview"
                                                             src="{{asset($images[6]->url_image)}}"
                                                             alt="{{$comicwork->name}}">
                                                    </div>
                                                    <!-- /.col -->
                                                    @if(count($images->all()) > 8)
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3 show-img-preview"
                                                                 src="{{asset($images[7]->url_image)}}"
                                                                 alt="{{$comicwork->name}}">
                                                            <img class="img-fluid show-img-preview"
                                                                 src="{{asset($images[8]->url_image)}}"
                                                                 alt="{{$comicwork->name}}">
                                                        </div>
                                                        <!-- /.col -->
                                                    @endif
                                                @endif
                                                @endif
                                                @endif
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    <p>Nothing!!</p>
                                </div>
                            @endif
                        </div>

                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
@endsection

@section('js')
{{--    <script src="{{ asset('admins/comicworks/show.js') }}"></script>--}}
@endsection


