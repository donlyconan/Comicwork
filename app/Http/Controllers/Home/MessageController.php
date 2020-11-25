<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function token(Request $request)
    {
        return view('home.message.er-token')->with('message', $request->message);
    }
}
