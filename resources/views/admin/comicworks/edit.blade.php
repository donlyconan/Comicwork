@extends('admin.layouts.admin-master')

@section('title')
    <title>Edit Comicworks</title>
@endsection

@section('css')
{{--    <link href="{{ asset('admins/comicworks/edit.css') }}" rel="stylesheet"/>--}}
@endsection

@section('content')
    <div class="content-wrapper">

    @include('admin.admin-patials.content-header', ['name' => 'Comicworks', 'action' => 'Edit', 'route' => 'http://127.0.0.1:8000/admin/comicworks/index'])

    <!-- Main content -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Comicwork</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.comicworks.update', ['id' => $comicwork->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name"
                                   value="{{$comicwork->name}}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control my-editor" rows="8" placeholder="Enter ..."
                                      name="description">
                                {{$comicwork->description}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" name="id_country">
{{--                                <option>Country selection</option>--}}
                                @foreach($countries as $countryItem)
                                    @if($comicwork->country->id == $countryItem->id)
                                        <option value="{{$countryItem->id}}" selected>{{$countryItem->name}}</option>
                                    @else
                                        <option value="{{$countryItem->id}}">{{$countryItem->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" placeholder="Enter author" name="author"
                                   value="{{$comicwork->author}}">
                        </div>

                        <div class="form-group">
                            <label>Publishing Company</label>
                            <input type="text"
                                   class="form-control" placeholder="Enter publishing company"
                                   name="publishing_company" value="{{$comicwork->publishing_company}}">
                        </div>

                        <div class="form-group">
                            <label>Publishing Year</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"
                                       name="publishing_year" value={{$comicwork->publishing_year}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Comicwork Profile</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="url_image" id="imgInp">
                                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Preview</label>
                            <img id="preview" class="edit-img-preview" src="{{\App\MyStorage\FileSystem::asset($comicwork->url_image) }}"
                                 alt="{{$comicwork->name}}">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input class="custom-control-input" type="checkbox" id="customCheckbox1"--}}
{{--                                       name="forboy" checked="{{$comicwork->forboy}}">--}}
{{--                                <label for="customCheckbox1" class="custom-control-label">Forboy</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <label>Tags</label>
                            <select class="form-control tags_selection" multiple="multiple" name="tags[]">
                                @foreach($tags as $tagItem)
                                    {{$check = False}}
                                    @foreach($comicwork->tags as $item)
                                        @if($tagItem->id == $item->id)
                                            <option value="{{$tagItem->label}}" selected>{{$tagItem->label}}</option>
                                            {{$check = True}}
                                            @break
                                        @endif
                                    @endforeach
                                    @if($check == False)
                                        <option value="{{$tagItem->label}}" >{{$tagItem->label}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
{{--                        <button type="button" class="btn btn-dark ">Cancel</button>--}}
                    </div>
                </form>
            </div>
        </div>

        <!-- /.content -->
    </div>
@endsection

@section('js')
{{--    <script src="{{ asset('admins/comicworks/edit.js') }}"></script>--}}
@endsection


