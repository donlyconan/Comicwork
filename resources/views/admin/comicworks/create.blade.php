@extends('admin.layouts.admin-master')

@section('title')
    <title>Create Comicworks</title>
@endsection

@section('css')
{{--    <link href="{{ asset('admins/comicworks/create.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Comicworks', 'action' => 'Create', 'route' => 'http://127.0.0.1:8000/admin/comicworks/index'])

    <!-- Main content -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>
                <!-- /.card-header -->

                <!--validation-place -->
{{--                <div class="col-md-12">--}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}

                <!-- form start -->
                <form role="form" action="{{route('admin.comicworks.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Hàm old có tác dụng giữ lại giá trị của field trong quá trình validate dữ liệu form bị lỗi-->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   value="{{old('name')}}"
                                   placeholder="Enter name" name="name">
                            @error('name')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control my-editor @error('description') is-invalid @enderror"
                                      rows="8" placeholder="Enter ..."
                                      name="description">
                                {{old('description')}}
                            </textarea>
                            @error('description')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>Country</label>--}}
{{--                            <select class="form-control @error('id_country') is-invalid @enderror"--}}
{{--                                    name="id_country">--}}
{{--                                <option value="" >Country selection</option>--}}
{{--                                {!! $countryOptions !!}--}}
{{--                            </select>--}}
{{--                            @error('id_country')--}}
{{--                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control @error('id_country') is-invalid @enderror"
                                    name="id_country">
                                <option value="" >Country selection</option>
                                @if(old('id_country') != null)
                                    @foreach($countries as $countryItem)
                                        @if(old('id_country') == $countryItem->id)
                                            <option value={{$countryItem->id}} selected>{{$countryItem->name}}</option>
                                        @else
                                            <option value={{$countryItem->id}} >{{$countryItem->name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    {!! $countryOptions !!}
                                @endif

                            </select>
                            @error('id_country')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                   value="{{old('author')}}"
                                   placeholder="Enter author" name="author">
                            @error('author')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Publishing Company</label>
                            <input type="text" value="{{old('publishing_company')}}"
                                   class="form-control @error('publishing_company') is-invalid @enderror"
                                   placeholder="Enter publishing company"
                                   name="publishing_company">
                            @error('publishing_company')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Publishing Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" value="{{old('publishing_year')}}"
                                       class="form-control @error('publishing_year') is-invalid @enderror"
                                       data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"
                                       name="publishing_year">
                            </div>
                            @error('publishing_year')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Comicwork Profile</label>
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

{{--                        <div class="form-group">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input class="custom-control-input" type="checkbox" id="customCheckbox1"--}}
{{--                                       name="forboy">--}}
{{--                                <label for="customCheckbox1" class="custom-control-label">Forboy</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label>Tags</label>--}}
{{--                            <select class="form-control tags_selection @error('tags') is-invalid @enderror"--}}
{{--                                    multiple="multiple" name="tags[]">--}}
{{--                                {!! $tagOptions !!}--}}
{{--                            </select>--}}
{{--                            @error('tags')--}}
{{--                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label>Tags</label>
                            <select class="form-control tags_selection @error('tags') is-invalid @enderror"
                                    multiple="multiple" name="tags[]">
                                @if(old('tags') == null)
                                    {!! $tagOptions !!}
                                @else
                                    @foreach(old('tags') as $tag)
                                        <option value="{{ $tag }}" selected="selected">{{ $tag }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('tags')
                            <div class="alert alert-danger validation-comicwork">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Status</label>--}}
                        {{--                            <div class="custom-control custom-checkbox">--}}
                        {{--                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">--}}
                        {{--                                <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="custom-control custom-checkbox">--}}
                        {{--                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="">--}}
                        {{--                                <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

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


