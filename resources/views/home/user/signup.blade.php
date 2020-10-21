@extends('layout.login-master')

@section('title')
    Sign up
@endsection


@section('body')
    <div class="col-md-5 mx-auto">
        <div class="myform form ">
            <div class="logo mb-3">
                <div class="col-md-12 text-center">
                    <h1>Đăng ký</h1>
                </div>
            </div>
            <form action="{{route("signup.new-account")}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="bot-left">
                        <label for="exampleInputEmail1">Họ</label>
                        <input type="text" name="firstname" class="form-control" id="firstname"
                               aria-describedby="emailHelp"
                               value="{{old('firstname')}}"
                               placeholder="Nhập họ">
                    </div>
                    <div class="bot-right">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" name="lastname" class="form-control" id="lastname"
                               aria-describedby="emailHelp"
                               value="{{old("lastname")}}"
                               placeholder="Nhập tên">
                    </div>
                </div>
                <div id="bottom">
                    <div class="form-group">
                        <label for="username">Tên tài khoản</label>
                        <input type="text" name="username" class="form-control" placeholder="Nhập tên tài khoản"
                               value="{{old("username")}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email"
                               value="{{old('email')}}"
                               class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                        <input type="password" name="repassword" id="repassword" class="form-control"
                               placeholder="Nhập lại mật khẩu">
                    </div>
                    <div>
                        <div class="messages">
                            <span class="txt">Giới tính: </span>
                            <input type="radio" id="gender1" name="gender" value="0"
                                   checked="{{old('gender') == 0 ? 'checked' : ''}}">
                            <label for="gender1">Nam</label>
                            <input type="radio" id="gender2" name="gender" value="1"
                                   checked="{{old('gender') == 1 ? 'checked' : ''}}">
                            <label for="gender2">Nữ</label>
                        </div>
                    </div>
                    <div>
                        @if(count($errors) > 0 && $errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li style="margin-left: 10px;">{{$error}}</li>
                                @endforeach
                            </ul>
                        @elseif(session('notify'))
                            <div class="alert alert-success" style="text-align: center;">{{session('notify')}}</div>
                        @endif
                    </div>
                    <div class="col-md-12 text-center mb-3">
                        <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Đăng ký</button>
                    </div>
                    <div class="form-group">
                        <p class="text-center"><a href="login" id="signin">Bạn đã có tài khoản?</a></p>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
