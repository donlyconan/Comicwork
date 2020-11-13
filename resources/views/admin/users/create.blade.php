@extends('admin.layouts.admin-master')

@section('title')
    <title>Create Users</title>
@endsection

@section('css')
{{--    <link href="{{ asset('admins/users/create.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Users', 'action' => 'Create', 'route' => 'http://127.0.0.1:8000/admin/users/index'])

    <!-- Main content -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>

            <!-- form start -->
                <form role="form" action="{{route('admin.users.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Hàm old có tác dụng giữ lại giá trị của field trong quá trình validate dữ liệu form bị lỗi-->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{old('email')}}"
                                   class="form-control @error('publishing_company') is-invalid @enderror"
                                   placeholder="Enter email"
                                   name="email">
                            @error('email')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
{{--                                   value="{{old('password')}}"--}}
                                   placeholder="Enter password" name="password">
                            @error('password')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   value="{{old('username')}}"
                                   placeholder="Enter username" name="username">
                            @error('username')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <textarea class="form-control my-editor @error('full_name') is-invalid @enderror"
                                      rows="8" placeholder="Enter ..."
                                      name="full_name">
                                {{old('full_name')}}
                            </textarea>
                            @error('full_name')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                       name="sexs">
                                <label for="customCheckbox1" class="custom-control-label">Gender</label>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>Roles</label>--}}
{{--                            <select class="form-control @error('id_role') is-invalid @enderror"--}}
{{--                                    name="id_role">--}}
{{--                                <option value="" >Role selection</option>--}}
{{--                                @if(old('id_role') != null)--}}
{{--                                    @foreach($roles as $roleItem)--}}
{{--                                        @if(old('id_role') == $roleItem->id)--}}
{{--                                            <option value={{$roleItem->id}} selected>{{$roleItem->display_name}}</option>--}}
{{--                                        @else--}}
{{--                                            <option value={{$roleItem->id}} >{{$roleItem->display_name}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                    {!! $roleOptions !!}--}}
{{--                                @endif--}}

{{--                            </select>--}}
{{--                            @error('id_country')--}}
{{--                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" value="{{old('date_of_birth')}}"
                                       class="form-control @error('date_of_birth') is-invalid @enderror"
                                       data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"
                                       name="date_of_birth">
                            </div>
                            @error('date_of_birth')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control my-editor @error('address') is-invalid @enderror"
                                      rows="8" placeholder="Enter ..."
                                      name="address">
                                {{old('address')}}
                            </textarea>
                            @error('address')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{old('phone')}}"
                                   placeholder="Enter phone number" name="phone">
                            @error('phone')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Profile Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('url_image') is-invalid @enderror"
                                           name="url_image" id="imgInp">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                </div>
                            </div>
                            @error('url_image')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Preview</label>
                            <img id="preview" class= "create-img-preview" src="" alt="">
                        </div>


                        <div class="form-group">
                            <label>Roles</label>
                            <select class="form-control tags_selection @error('roles') is-invalid @enderror"
                                    multiple="multiple" name="roles[]">
                                @if(old('roles') == null)
                                    {!! $roleOptions !!}
                                @else
                                    @foreach(old('roles') as $roleItem)
                                        <option value="{{ $roleItem }}" selected="selected">{{ $roleItem }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('roles')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
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

@section('js')
    {{--    <script src="{{ asset('admins/comicworks/create.js') }}"></script>--}}
@endsection


