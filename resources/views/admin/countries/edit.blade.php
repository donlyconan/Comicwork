@extends('admin.layouts.admin-master')

@section('title')
    <title>Edit Countries</title>
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Countries', 'action' => 'Edit', 'route' => 'http://127.0.0.1:8000/admin/countries/index'])

    <!-- Main content -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Country</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.countries.update', ['id' => $data->id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value="{{$data->name}}">
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


