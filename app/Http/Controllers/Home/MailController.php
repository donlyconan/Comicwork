<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\UserForgot;
use App\Model\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class MailController extends Controller
{

    //tien hanh giu mail xin cấp lại mật khẩu từ phía người dùng
    public function forgot(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.exists' => 'Email không tồn tại',
            'email.email' => 'Email không đúng định dạng'
        ]);

        $user = User::where("email", '=', $req->email)->first();

        $data = [
            "full_name" => $user->full_name,
            "username" => $user->username,
//            "password" => $new_password,
            "time" => time()
        ];

        $notify = "Giử mail thành công!";

        \Mail::to($user->email)->send(new UserForgot($data));
//        $user->password = bcrypt($new_password);
        $user->save();

        return redirect()->back()->with(compact('notify'));
    }






}
