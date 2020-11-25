<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserActivation;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use function Symfony\Component\String\u;

class UserActivationController extends Controller
{

    //Xác thực người dùng
    public function active($token)
    {
        try {
            $id = \Crypt::decryptString($token);
        } catch (Exception $e) {
            return '<h3>Không thể tiến hành xác thực.</h3>';
        }

        $userActive = UserActivation::findOrFail($id);
        if (strtotime($userActive->expires_at) < time()) {
            $userActive->delete();
            return '<h3>Liên kết đã hết hiệu lực.</h3>';
        } else {
            $userActive->user()->update(['status' => 1]);
            $userActive->delete();
            return view('home.user-activation.activation');
        }

    }


}
