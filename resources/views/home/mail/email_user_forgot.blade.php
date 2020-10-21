<html>
<head>
    <style>
        * {
            border-box: box-sizing;
        }

        body {
            padding: 10px;
        }

        .center {
            display: inline-table;
            width: 100%;
            background: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }

        .center a {
            border-radius: 10px;
            padding: 10px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div>Xin chào <b>{{$data->user()->first()->full_name}}</b></div>
    <p>Đây là thư giử cho bạn từ trung tâm hỗ trợ người dùng. <br>
    Bạn đã yêu cầu cấp lại mật khẩu vào lúc <b>{{$data->str_time}}</b></p>
    <div class="center">
        <p><b>Tài khoản:</b> {{$data->user()->first()->username}}</p>
        <p>
            <b>Thiết lập mật khẩu: </b>
            <a href="{{route('user.authenticate', ['token'=> $data->token()])}}">Tại đây</a>
        </p>
    </div>
    <p>Hãy chắc chắn rằng người yêu cầu chính là bạn</p>
    <p>Mọi thắc mắc xin liên hệ: <b>MobileWorld@gmail.com</b></p>
</body>
</html>
