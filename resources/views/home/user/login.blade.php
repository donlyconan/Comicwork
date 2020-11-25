@extends('layout.login-master')

@section('title')
    Login
@endsection


@section('body')
    <div class="col-md-5 mx-auto">
        <div id="first">
            <div class="myform form ">
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <form action="{{route('user-login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tài khoản</label>
                        <input type="text" name="username" class="form-control" id="username"
                               value="{{old('username')}}"
                               placeholder="Nhập tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group" id="bottom-media">
                        <div class="bot-left">
                            <input type="checkbox" class="text-center" id="remember" name="remember"
                                {{old('remember_token') ? 'checked' : ''}}>
                            <label class="text-center" id="lbremeber">Nhớ mật khẩu</label>
                        </div>
                        <div class="bot-right">
                            <a href="{{route('user.forgot')}}"><u>Quên mật khẩu?</u></a>
                        </div>
                    </div>
                    <div class="notify">
                        @if(count($errors) > 0 && $errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li style="margin-left: 10px; text-align: center;">{{$error}}</li>
                                @endforeach
                            </ul>
                        @elseif(session('notify'))
                            <div class="alert alert-danger" style="text-align: center;">{{session('notify')}}</div>
                        @endif
                    </div>
                    <div style="margin-top: 20px;"  class="col-md-12 text-center ">
                        <button type="submit" class="btn btn-block mybtn btn-primary tx-tfm">Đăng nhập</button>
                    </div>
                    <div class="col-md-12 ">
                        <div class="login-or">
                            <hr class="hr-or">
                            <span class="span-or">Hoặc</span>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <p class="text-center">
                            <a href="{{URL::to('auth/google')}}" class="google btn mybtn"><i class="fa fa-google-plus">
                                </i> Đăng nhập với Google
                            </a>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="text-center">Bạn không có tài khoản? <a href="{{route('register')}}" id="signup">Đăng ký tại
                                đây.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
