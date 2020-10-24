<html>
<head>
    <style>
        * {
            box-sizing: border-box;
        }
        .center {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .message {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="center">
    <div class="message">{{$message ?? 'Không thể tiến hành xác thực'}}</div>
</div>
</body>
</html>
