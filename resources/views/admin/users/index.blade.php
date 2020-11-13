@extends('admin.layouts.admin-master')

@section('title')
    <title>List Users</title>
@endsection


@section('css')
{{--    <link href="{{ asset('admins/comicworks/index.css') }}" rel="stylesheet"/>--}}

@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Users', 'action' => 'List', 'route' => 'http://127.0.0.1:8000/admin/users/index'])

    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="mytable" class="table table-striped table-bordered display"

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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

        <!-- .danger modal -->
        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Warning!!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete this User record!!</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <a id="id-confirm-delete-record" href="" data-url=""
                           class="btn btn-outline-light confirm-delete-record"
                           data-dismiss="modal"
                        >Confirm</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.content -->
    </div>
@endsection

@section('js')
{{--    <script src="{{ asset('admins/comicworks/index.js') }}"></script>--}}
@endsection


