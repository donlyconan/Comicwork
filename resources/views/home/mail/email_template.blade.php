<html>
<head>
    <style>
        * {
            border-box: box-sizing;
        }

        .username {
            display: inline-table;
            width: 100%;
            background: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }


        .username a{
            width: 150px;
            height: 35px;
            border-radius: 10px;
            color: #fff;
            padding: 10px;
            margin-top: 10px;
            background: #f18121;
        }
    </style>
</head>
<body>
<div>Chào <b>{{$data['full_name']}}</b></div>
<p>Đây là thư giử cho bạn từ trung tâm hỗ trợ người dùng.
    Yêu cầu cấp lại mật khẩu vào lúc <i>{{date("d/m/Y h:m", $data['time'])}}</i></p>
<div class="username">
    <p><b>Tài khoản:</b> {{$data['username']}}</p>
    <p><b>Mật khẩu:</b> {{$data['password']}}</p>
    <a href="localhost:8000/login">Đăng nhập</a>
</div>

<p>Hãy chắc chắn rằng người yêu cầu chính là bạn</p>
<p>Mọi thắc mắc xin liên hệ: MobileWorld@gmail.com</p>
</body>
</html>
