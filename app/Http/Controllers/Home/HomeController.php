<?php

namespace App\Http\Controllers;

use App\Model\Chapter;
use App\Model\Comicwork;
use App\Model\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main/index', ['user'=>User::find(6)]);
    }
//
//    public function getName($name)
//    {
//        echo "Name: $name";
//    }
//
//    public function postFile(Request $request)
//    {
//        if ($request->hasFile("myfile")) {
//            $file = $request->file('myfile');
//            $file->move('image', $file->getClientOriginalName());
//            return "Upload successful!";
//        } else {
//            return "Chua co file";
//        }
//    }
//
//
//    public function getView($name)
//    {
//        $chapter = Chapter::find(1);
//        dd($chapter);
//        return view('hello', ['name' => $name]);
//    }





}
