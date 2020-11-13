@extends('admin.layouts.admin-master')

@section('title')
    <title>Show Users</title>
@endsection

@section('css')
    {{--    <link href="{{ asset('admins/comicworks/show.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Users', 'action' => 'Show', 'route' => 'http://127.0.0.1:8000/admin/users/index'])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{\App\MyStorage\FileSystem::asset($user->url_image) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->username}}</h3>

                                <p class="text-muted text-center">
                                    @foreach($user->roles()->get() as $roleItem)
                                        <span class="badge badge-success">{{$roleItem->display_name}}</span>
                                    @endforeach
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Full name</b> <a class="float-right">
                                            {{$user->full_name ? substr($user->full_name, 3, strlen($user->full_name)-7) : '...'}}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">{{$user->follows()->count()}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Votes time</b> <a class="float-right">{{$user->votes()->count()}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Views time</b> <a class="float-right">{{$user->views()->count()}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Member since</b> <a class="float-right">{{date('d-m-Y', strtotime($user->created_at))}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Last login</b> <a class="float-right">{{date('d-m-Y', strtotime($user->last_login))}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-9">
                        <!-- About Comicwork Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-map-marked mr-1"></i> Address</strong>

                                <p class="text-muted">
                                    {{$user->address ? substr($user->address, 3, strlen($user->address)-7) : '...'}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-paper-plane mr-1"></i> Email</strong>

                                <p class="text-muted">{{$user->email}}</p>

                                <hr>

                                <strong><i class="fas fa-birthday-cake mr-1"></i> Date of Birth</strong>

                                <p class="text-muted">{{date('Y-m-d', strtotime($user->date_of_birth))}}</p>

                                <hr>

                                <strong><i class="fas fa-mobile-alt mr-1"></i> Phone number</strong>

                                <p class="text-muted">{{$user->phone}}</p>

                                <hr>

                                <strong><i class="fas fa-transgender-alt mr-1"></i> Gender</strong>

                                <p class="text-muted">{{$user->sexs == 1 ? 'Men' : 'Women'}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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


