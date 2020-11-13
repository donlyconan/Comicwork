@extends('admin.layouts.admin-master')

@section('title')
    <title>Add Roles</title>
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Roles', 'action' => 'Add', 'route' => 'http://127.0.0.1:8000/admin/roles/index'])

    <!-- Main content -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.roles.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                   placeholder="Enter display name" name="display_name">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection


