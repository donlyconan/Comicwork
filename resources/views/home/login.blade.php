<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<div class="col-md-5 mx-auto">
    <div id="first">
        <div class="myform form ">
            <div class="logo mb-3">
                <div class="col-md-12 text-center">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
            <form action="login" method="post" name="login">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tài khoản</label>
                    <input type="text" name="username" class="form-control" id="username"
                           pattern="(([\w\d.]+)@(\w+){2,5}(\.(\w+).{1,50})$)|([\w\d]+){5,50}"
                           placeholder="Nhập tài khoản"
                            required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control"
                           pattern="([\w\d@.~!&*()^#]+){5,60}"
                           placeholder="Nhập mật khẩu"   required>
{{--                    ="Mật khẩu phải chứa 5 đến 60 ký tự và không có ký tự khoảng trắng"--}}
                </div>
                <div class="form-group" id="bottom-media">
                    <div class="bot-left">
                        <input type="checkbox" class="text-center" id="remember" name="remember"
                               value="Nhớ mật khẩu">
                        <label class="text-center" id="lbremeber">Nhớ mật khẩu</label>
                    </div>
                    <div class="bot-right">
                        <a href="#"><u>Quên mật khẩu?</u></a>
                    </div>
                </div>
                <div class="notify">
                    <span id="error"></span>
                </div>
                <div class="col-md-12 text-center ">
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
                        <a href="" class="google btn mybtn"><i class="fa fa-google-plus">
                            </i> Đăng nhập với Google
                        </a>
                    </p>
                </div>
                <div class="form-group">
                    <p class="text-center">Bạn không có tài khoản? <a href="signup" id="signup">Đăng ký tại đây.</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script>
    @if (isset($result) && !$result)
        $('#error').text("Tài khoản hoặc mật khẩu không chính xác");
    @endif

    // $(document).ready(function() {
    //
    //     $('#first_form').submit(function(e) {
    //         e.preventDefault();
    //         var username = $('#username').val();
    //         var password = $('#password').val();
    //
    //         $(".error").remove();
    //
    //         if (first_name.length < 1) {
    //             $('#first_name').after('<span class="error">This field is required</span>');
    //         }
    //         if (last_name.length < 1) {
    //             $('#last_name').after('<span class="error">This field is required</span>');
    //         }
    //         if (email.length < 1) {
    //             $('#email').after('<span class="error">This field is required</span>');
    //         } else {
    //             var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
    //             var validEmail = regEx.test(email);
    //             if (!validEmail) {
    //                 $('#email').after('<span class="error">Enter a valid email</span>');
    //             }
    //         }
    //         if (password.length < 8) {
    //             $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
    //         }
    //     });
    //
    // });
</script>

</html>
