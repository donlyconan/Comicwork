<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<div class="col-md-5 mx-auto">
    <div class="myform form ">
        <div class="logo mb-3">
            <div class="col-md-12 text-center">
                <h1>Đăng ký</h1>
            </div>
        </div>
        <form action="{{route("signup.register")}}" method="post">
            @csrf
            <div class="form-group">
                <div class="bot-left">
                    <label for="exampleInputEmail1">Họ</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp"
                           value="{{old('firstname')}}"
                           placeholder="Nhập họ">
                </div>
                <div class="bot-right">
                    <label for="exampleInputEmail1">Tên</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp"
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
                        <input type="radio" id="gender1" name="gender" value="0" checked="checked">
                        <label for="gender1">Nam</label>
                        <input type="radio" id="gender2" name="gender" value="1" checked="">
                        <label for="gender2">Nữ</label>
                    </div>
                    <script>
                        @if(old("gender") == 0)
                        $('#gender1').prop("checked", true);
                        @else
                        $('#gender2').prop("checked", true);
                        @endif
                    </script>
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
</body>

</html>
