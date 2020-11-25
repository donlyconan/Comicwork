<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\MyStorage\FileModel;
use App\MyStorage\TimeInt;
use App\Render\NotificationRender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class LoginController extends Controller
{
    //tra ve giao dien login
    public function index()
    {
        return view('home.user.login');
    }


    /*
     * Xac thuc dang nhap
     *  1. Dang nhap voi email, password
     *  2. Dang nhap với Username, password
     */
    public function login(Request $request)
    {
        $validateUsername = \Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ], [
            'username.required' => 'Bạn chưa nhập tài khoản',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'username.exists' => 'Tên không tồn tại'
        ]);

        $validateEmail = \Validator::make($request->all(), [
            'username' => 'exists:users,email'
        ]);

        //Kiem tra du lieu dau vao
        if ($validateUsername->fails() and $validateEmail->fails()) {
            return back()->withErrors($validateUsername->errors());
        }

        $username = $request->username;
        $password = $request->password;
        $remember = $request->rememeber == 'on';

        $credentials = ['email' => $username, 'password' => $password];

        //Lay user dau tien tim duoc
        $user = User::whereUsername($username)
            ->orWhere('email', $username)
            ->first();

        // Kiem tra tài khoản đã kích hoạt hay chưa
        if ($user != null and !$user->activated()) {
            $notify = "Tài khoản $username hiện chưa được kích hoạt,
                    vui lòng kích hoạt tài khoản trước khi đăng nhập";
            return back()->with(compact('notify'))->withInput();
        } else if (Auth::attempt(compact('username', 'password'), $remember)
            or Auth::attempt($credentials, $remember)) {
            self::createToken(Auth::user());

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboards')
                    ->withCookie('remember_token', $user->remember_token)
                    ->withCookie('username', $username);
            } else {
                return redirect()->route('homepage')
                    ->withCookie('remember_token', $user->remember_token)
                    ->withCookie('username', $username);
            }
        } else {
            $notify = 'Tài khoản hoặc mật khẩu không chính xác';
            return back()->with(compact('notify'))->withInput();
        }
    }


    public static function createToken(User $user)
    {
        $token = $user->createToken('Personal Access', [0]);
        $token->expires_at = now()->addDays(7);
        $token->token->save();

        // Thiet lap thoi gian song
        $time = strtotime($token->expires_at) - time();
        \Cookie::queue('access-token', $token->accessToken, $time);
    }


}
