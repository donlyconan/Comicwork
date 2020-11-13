@extends('admin.layouts.admin-master')

@section('title')
    <title>Edit Users</title>
@endsection

@section('css')
    {{--    <link href="{{ asset('admins/users/create.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Users', 'action' => 'Edit', 'route' => 'http://127.0.0.1:8000/admin/users/index'])

    <!-- Main content -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit</h3>
                </div>

                <!-- form start -->
                <form role="form" action="{{route('admin.users.update', ['id' => $user->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                   class="form-control @error('publishing_company') is-invalid @enderror"
                                   placeholder="Enter email"
                                   value = "{{$user->email}}"
                                   name="email">
                            @error('email')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   {{--                                   value="{{old('password')}}"--}}
                                   value="{{$user->password}}"
                                   readonly
                                   placeholder="Enter password" name="password">
                            @error('password')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                   value="{{$user->username}}"
                                   placeholder="Enter username"
                                   name="username">
                            @error('username')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <textarea class="form-control my-editor @error('full_name') is-invalid @enderror"
                                      rows="8" placeholder="Enter ..."
                                      name="full_name">
                                {{$user->full_name}}
                            </textarea>
                            @error('full_name')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                @if($user->sexs == 1)
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                           name="sexs" checked>
                                @else
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                           name="sexs">
                                @endif
                                <label for="customCheckbox1" class="custom-control-label">Gender</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
{{--                                {{dd($user->date_of_birth)}}--}}
                                <input type="date"
                                       class="form-control @error('date_of_birth') is-invalid @enderror"
                                       data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"
                                       value="{{date("Y-m-d", strtotime($user->date_of_birth))}}"
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
                                {{$user->address}}
                            </textarea>
                            @error('address')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{$user->phone}}"
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
                            <img id="preview" class= "create-img-preview" src="{{\App\MyStorage\FileSystem::asset($user->url_image) }}"
                                 alt="">
                        </div>


                        <div class="form-group">
                            <label>Roles</label>
                            <select class="form-control tags_selection @error('roles') is-invalid @enderror"
                                    multiple="multiple" name="roles[]">
                                @foreach($roles as $roleItem)
                                    {{$check = False}}
                                    @foreach($user->roles as $item)
                                        @if($roleItem->id == $item->id)
                                            <option value="{{$roleItem->display_name}}" selected>{{$roleItem->display_name}}</option>
                                            {{$check = True}}
                                            @break
                                        @endif
                                    @endforeach
                                    @if($check == False)
                                        <option value="{{$roleItem->display_name}}" >{{$roleItem->display_name}}</option>
                                    @endif
                                @endforeach
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


