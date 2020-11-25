<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserActivation;
use App\MyStorage\Regex;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('home.user.password');
    }

    //thay doi-hien thi form thay doi mat khau cho user
    public function change(Request $req)
    {
        $user = \Auth::user();

        if (!\Hash::check($req->oldPassword, $user->password)) {
            \Session::put('failed', 'Mật khẩu không chính xác');
            return redirect()->back();
        }

        $this->validate($req, [
            'oldPassword' => 'required|regex:'.Regex::getRegexPassword(),
            'newPassword' => 'required|regex:'.Regex::getRegexPassword(),
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'oldPpassword.required' => 'Bạn chưa nhập mật khẩu người dùng',
            'newPassword.required' => 'Bạn chưa nhập mật khẩu mới',
            'confirmPassword.required' => 'Bạn chưa xác nhận mật khẩu mới',
            'newPassword.regex' => 'Mật khẩu phải là chữ, số hoặc một trong các ký tự đặc biệt:
                 {@.$~!&*()^#%}, chứa từ 6 đến 100 ký tự',
            'confirmPasssword.same' => 'Xác thực mật khẩu không trùng khớp',
        ]);

        $user->password = bcrypt($req->newPassword);
        $user->save();

        \Session::put('success', 'Thay đổi mật khẩu thành công');
        return redirect()->back();
    }


    /*
     * Thay đổi mật khẩu dự trên xác thực email
     */
    public function reset(Request $request)
    {
        $token_id = $request->token;
        $userActivation = UserActivation::findOrFail($token_id);
        $user = $userActivation->user()->first();

        $this->validate($request, [
            'newPassword' => 'required|regex:' . Regex::getRegexPassword(),
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'newPassword.regex' => 'Mật khẩu phải là chữ, số hoặc một trong các ký tự đặc biệt:
                 {@.$~!&*()^#%}, chứa từ 6 đến 100 ký tự',
            'newPassword.required' => 'Bạn chưa nhập mật khẩu mới',
            'confirmPassword.required' => 'Bạn chưa xác nhận mật khẩu mới',
            'confirmPasssword.same' => 'Mật khẩu không trùng khớp',
        ]);

        $user->password = bcrypt($request->newPassword);
        $user->save();

        //Xoa xac thuc
        $userActivation->delete();
        \Auth::login($user);
        LoginController::createToken($user);
        return redirect()->route('homepage');
    }
}
