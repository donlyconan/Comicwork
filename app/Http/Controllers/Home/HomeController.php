<?php

namespace App\Http\Controllers;

use App\Model\Chapter;
use App\Model\Comicwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
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
