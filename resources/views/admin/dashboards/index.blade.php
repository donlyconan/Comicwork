@extends('admin.layouts.admin-master')

@section('title')
    <title>Trang chu admin</title>
@endsection

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{asset('admins/comicworks/line-char.js')}}"></script>

@section('content')
    <div class="content-wrapper">
    @include('admin.admin-patials.content-header', ['name' => 'Dashboard', 'action' => '', 'route' => ''])

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$user_online}}</h3>

                                <p>Online Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>
                            <div class="small-box-footer" style="height: 30px"></div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$views}}</h3>

                                <p>Views Total</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-eye"></i>
                            </div>
                            <div class="small-box-footer" style="height: 30px"></div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$follows}}</h3>

                                <p>Follows Total</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-flag"></i>
                            </div>
                            <div class="small-box-footer" style="height: 30px"></div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$votes}}</h3>

                                <p>Votes Total</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-done-all"></i>
                            </div>
                            <div class="small-box-footer" style="height: 30px"></div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


                <div class="row">
                    <section class="col-lg-12 connectedSortable">

                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Xếp hạng truyện tranh
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('include.line-char')
                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="box-table">
                                    <div class="columns">
                                        <label>Danh mục: </label>
                                        <select onchange="loadDataAnalysis()" class="select-box danh-muc" name="category">
                                            @foreach($val_cate as $key => $cate)
                                                <option onclick="loadDataAnalysis()" value="{{$cate}}" {{$cate == 'cao-nhat' ? 'selected' : ''}}>{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="columns">
                                        <label>Thời gian: </label>
                                        <select onchange="loadDataAnalysis()" class="select-box thoi-gian" name="time">
                                            @foreach($val_times as $key => $time)
                                                <option value="{{$time}}" {{$time == 2592000 ? 'selected' : ''}}>{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="column">
                                        <span style="display: none;"  class="fa fa-lock loading">   Đang tải dữ liệu...</span>
                                    </div>


{{--                                    <div class="columns">--}}
{{--                                        <label>Chỉ tiêu: </label>--}}
{{--                                        <select  class="select-box box-input" name="target">--}}
{{--                                            <option value="1000">1000</option>--}}
{{--                                            <option value="1000">2000</option>--}}
{{--                                            <option value="1000">3000</option>--}}
{{--                                            <option value="1000">4000</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </section>
                </div>




                <div class="row">
                    <section class="col-lg-12 connectedSortable">

                    <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Amount of Registration (Day/Month)
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="chart" id="line-chart" style="height: 450px;"></canvas>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
{{--                                    <div class="col-4 text-center">--}}
{{--                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="100"--}}
{{--                                               data-fgColor="#39CCCC">--}}

{{--                                        <div class="text-white">1/3 First</div>--}}
{{--                                    </div>--}}
{{--                                    <!-- ./col -->--}}
{{--                                    <div class="col-4 text-center">--}}
{{--                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="100" data-height="100"--}}
{{--                                               data-fgColor="#39CCCC">--}}

{{--                                        <div class="text-white">1/3 Second</div>--}}
{{--                                    </div>--}}
{{--                                    <!-- ./col -->--}}
{{--                                    <div class="col-4 text-center">--}}
{{--                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="100"--}}
{{--                                               data-fgColor="#39CCCC">--}}

{{--                                        <div class="text-white">1/3 Third</div>--}}
{{--                                    </div>--}}
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </section>
                </div>

{{--                <div class="row">--}}
{{--                    <!-- Left col -->--}}
{{--                    <section class="col-lg-7 connectedSortable">--}}
{{--                        <!-- Custom tabs (Charts with tabs)-->--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">--}}
{{--                                    <i class="fas fa-chart-pie mr-1"></i>--}}
{{--                                    Sales--}}
{{--                                </h3>--}}
{{--                                <div class="card-tools">--}}
{{--                                    <ul class="nav nav-pills ml-auto">--}}

{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#sales-chart" data-toggle="tab" >Donut</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div><!-- /.card-header -->--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="tab-content p-0">--}}
{{--                                    <!-- Morris chart - Sales -->--}}
{{--                                    <div class="chart tab-pane " id="revenue-chart"--}}
{{--                                         style="position: relative; height: 300px;">--}}
{{--                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
{{--                                    </div>--}}
{{--                                    <div class="chart tab-pane active" id="sales-chart"--}}
{{--                                         style="position: relative; height: 300px;">--}}
{{--                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}

{{--                    </section>--}}
{{--                    <!-- /.Left col -->--}}
{{--                    <!-- right col (We are only adding the ID to make the widgets sortable)-->--}}

{{--                    <!-- right col -->--}}
{{--                </div>--}}
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

        <section>

        </section>

{{--        User table--}}
        <div class="card-body" style="display: none">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="mytableDashBoard" class="table table-striped table-bordered display"

                               role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                >Id
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column descending"
                                    aria-sort="ascending">User Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Password
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Full Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Gender
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Date of Birth
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Address
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Phone Number
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                >Profile Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                >Roles
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                >Created_at
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                >Updated_at
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 250px"
                                >...
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $userItem)
                                <tr role="row" class="odd">
                                    <td class="">{{$userItem->id}}</td>
                                    <td class="">{{$userItem->username}}</td>
                                    <td class="">{{$userItem->password}}</td>
                                    <td class="">{{$userItem->full_name}}</td>

                                    <td class="">{{$userItem->email}}</td>
                                    <td class="">{{$userItem->sexs}}</td>
                                    <td class="">{{$userItem->date_of_birth}}</td>
                                    <td class="">{{$userItem->address}}</td>
                                    <td class="">{{$userItem->phone}}</td>
                                    <td class="">
                                        <img class="index-img-profile"
                                             src="{{\App\MyStorage\FileSystem::asset($userItem->url_image) }}"
                                             alt="{{$userItem->name}}">
                                    </td>
                                    <td class="">
                                        {{--                                                        {{dd($userItem->roles()->get())}}--}}
                                        @foreach($userItem->roles()->get() as $roleItem)
                                            <span class="badge badge-success">{{$roleItem->display_name}}</span>
                                        @endforeach
                                    </td>
                                    <td class="">{{$userItem->created_at}}</td>
                                    <td class="">{{$userItem->updated_at}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('admin.users.show', ['id' => $userItem->id])}}">
                                            <i class="fas fa-folder"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('admin.users.edit', ['id' => $userItem->id])}}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm delete-record" href=""
                                           data-toggle="modal" data-target="#modal-danger"
                                           data-url="{{route('admin.users.destroy', ['id' => $userItem->id])}}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Id</th>
                                <th rowspan="1" colspan="1">User Name</th>
                                <th rowspan="1" colspan="1">Password</th>
                                <th rowspan="1" colspan="1">Full Name</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Gender</th>
                                <th rowspan="1" colspan="1">Date of Birth</th>
                                <th rowspan="1" colspan="1">Address</th>
                                <th rowspan="1" colspan="1">Phone Number</th>
                                <th rowspan="1" colspan="1">Profile Image</th>
                                <th rowspan="1" colspan="1">Roles</th>
                                <th rowspan="1" colspan="1">Created_at</th>
                                <th rowspan="1" colspan="1">Updated_at</th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
{{--        Follows Count--}}
        <div class="card-body" style="display: none">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="mytableFollows" class="table table-striped table-bordered display"

                               role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                >Id
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column descending"
                                    aria-sort="ascending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Follows Count
                                </th>
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 250px"
                                >...
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($dataFollowsCount as $item)
                                <tr role="row" class="odd">
                                    <td class="">{{$item->id}}</td>
                                    <td class="">{{$item->name}}</td>
                                    <td class="">{{$item->follows_count}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('admin.users.show', ['id' => $userItem->id])}}">
                                            <i class="fas fa-folder"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('admin.users.edit', ['id' => $userItem->id])}}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm delete-record" href=""
                                           data-toggle="modal" data-target="#modal-danger"
                                           data-url="{{route('admin.users.destroy', ['id' => $userItem->id])}}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Id</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Follows Count</th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        {{--        Votes Count--}}
        <div class="card-body" style="display: none">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="mytableVotes" class="table table-striped table-bordered display"

                               role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                >Id
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                >Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                >Votes Count
                                </th>
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 250px"
                                >...
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($dataVotesCount as $item)
                                <tr role="row" class="odd">
                                    <td class="">{{$item->id}}</td>
                                    <td class="">{{$item->name}}</td>
                                    <td class="">{{$item->votes_count}}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('admin.users.show', ['id' => $userItem->id])}}">
                                            <i class="fas fa-folder"></i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('admin.users.edit', ['id' => $userItem->id])}}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm delete-record" href=""
                                           data-toggle="modal" data-target="#modal-danger"
                                           data-url="{{route('admin.users.destroy', ['id' => $userItem->id])}}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Id</th>
                                <th rowspan="1" colspan="1">Follows Count</th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <!-- BAR CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Top Follows/Votes Comicwork</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="height:530px; min-height:230px"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <!-- STACKED BAR CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart" style="height:530px; min-height:230px"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
@endsection

