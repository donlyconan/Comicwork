<html>
<head>

</head>
<body>
<p>Xin chào: <b>{{$data->user()->first()->full_name}}</b></p>
<p>Bạn đã tạo tài khoản thành công</p>
<p>Bạn cần kích hoạt tài khoản để có thể đăng nhập và sử dụng dịch vụ của chúng tôi:
    <a href="{{route('user.activation', ['token'=> $data->token()])}}">Kích hoạt</a></p>
<p>Mọi thắc mắc xin liên hệ: <b>MobileWorld.oscar@gmail.com</b></p>
</body>
</html>
