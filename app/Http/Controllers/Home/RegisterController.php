<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\UserForgot;
use App\Model\Role;
use App\Model\RoleUser;
use App\Model\User;
use App\Model\UserActivation;
use App\MyStorage\Regex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use function App\Php\getRegexFullname;
use function App\Php\getRegexLastname;
use function App\Php\getRegexPassword;
use function App\Php\getRegexUsername;
use const App\Php\REGEX_FIRSTNAME;
use const App\Php\REGEX_LASTNAME;
use const App\Php\REGEX_PASSWORD;
use const App\Php\REGEX_USERNAME;

class RegisterController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('home.user.signup');
    }


    /*
     * Đăng ký người dùng hệ thống
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users,username|regex:' . Regex::getRegexUsername(),
            'password' => 'required|regex:' . Regex::getRegexPassword(),
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required|regex:' . Regex::getRegexFirstname(),
            'lastname' => 'required|regex:' . Regex::getRegexLastname(),
            'repassword' => 'required|same:password'
        ], [
            'username.required' => 'Bạn chưa nhập tài khoản',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'username.regex' => 'Tài khoản phải là chữ hoặc số và chứa từ 5 đến 100 ký tự',
            'password.regex' => 'Mật khẩu phải là chữ, số hoặc một trong các ký tự đặc biệt: {@.$~!&*()^#%}, chứa từ 6 đến 100 ký tự',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không tồn tại',
            'email.unique' => 'Email đăng ký tài khoản đã tồn tại',
            'firstname.required' => 'Bạn chưa nhập họ tên',
            'lastname.required' => 'Bạn chưa nhập họ tên',
            'firstname.regex' => 'Họ phải là chữ và chứa từ 1 đến 40 ký tự',
            'lastname.regex' => 'Tên phải là chữ và chứa từ 1 đến 40 ký tự',
            'repassword.required' => 'Bạn cần xác nhận mật khẩu',
            'repassword.same' => 'Mật khẩu không trùng khớp',
            'email.exists' => 'Email đăng ký tài khoản đã tồn tại, vui lòng chọn email khác'
        ]);

        //dang ky nguoi dung
        $user = $this->createUser($request);

        //phan quyen mac dinh
        RoleUser::insert(['id_user' => $user->id, 'id_role' => 2]);

        //Giử email xác thực
        $this->sendMail($user);

        return back()->with('notify', 'Đăng ký tài khoản thành công, hãy truy cập email của bạn để xác thực tài khoản');
    }

    /*
     * Tạo người dùng người dùng
     */
    public function createUser(Request $request): User
    {
        $user = new User();
        $user->full_name = $request->get('firstname') . " " . $request->get('lastname');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = bcrypt($request->get('password'));
        $user->sexs = $request->get('gender');
        $user->save();
        return $user;
    }

    /**
     * @param User $user
     */
    public function sendMail(User $user): void
    {
        //Tạo mã xác thực
        $activation = new UserActivation();
        $activation->createToken('User Active');
        $activation->user_id = $user->id;
        $activation->expires_at = now()->addMonths(6);
        $activation->save();

        //Tiến hành giử thông báo xác thực
        \Mail::to($user->email)->send(new \App\Mail\UserActivation($activation));
    }
}
