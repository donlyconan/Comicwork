@extends('layout.login-master')

@section('title')
    Reset Password
@endsection


@section('body')
    <div class="col-md-5 mx-auto">
        <div id="first">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1>Thiết lập mật khẩu</h1>
                    </div>
                </div>

                <form action="{{route('user.reset-password')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="newPassword" id="password" class="form-control"
                               placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                        <input type="password" name="confirmPassword" id="repassword" class="form-control"
                               placeholder="Nhập lại mật khẩu">
                    </div>
                    <input type="text" value="{{$userActivation->id}}" name="token" hidden>
                    <div class="notify">
                        @if(count($errors) > 0 && $errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li style="margin-left: 10px;">{{$error}}</li>
                                @endforeach
                            </ul>
                        @elseif(session('notify'))
                            <div class="alert alert-success" style="text-align: center;">{{session('notify')}}</div>
                            <a href="{{route('login')}}">Đăng nhập</a>
                        @endif
                    </div>
                    <div style="margin-top: 30px; margin-bottom: 20px;"  class="col-md-12 text-center ">
                        <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm">Hoàn tất</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
