<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\UserForgot;
use App\Model\User;
use App\Model\UserActivation;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class ForgotController extends Controller
{
    /**
     * Trả về view trợ giúp thiết lập mật khẩu
     */
    public function index()
    {
        return view("home.user.forgot");
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.exists' => 'Bạn chưa đăng ký tài khoản',
        ]);

        $user = User::whereEmail($request->email)->first();

        UserActivation::where('user_id', $user->id)
            ->where('name', 'Forgot Password')->delete();

        $active = new UserActivation();
        $active->user_id = $user->id;
        $active->createToken('Forgot Password');
        $active->expires_at = now()->addDay();
        $active->save();

        \Mail::to($user->email)->send(new UserForgot($active));

        return back()->with('notify', 'Hãy truy cập email của bạn để thiếp lập lại mật khẩu');
    }

    public function authenticate($token)
    {
        try {
            $id = \Crypt::decryptString($token);
        } catch (Exception $e) {
            return '<h3>Xác thực không thành công</h3>';
        }
        $userActivation = UserActivation::find($id);

        if ($userActivation == null || strtotime($userActivation->expires_at) < time()) {
            $userActivation->delete();
            return '<h3>Liên kết đã hết hiệu lực</h3>';
        } else {
            return view('home.password.reset')->with(compact('userActivation'));
        }
    }
}
