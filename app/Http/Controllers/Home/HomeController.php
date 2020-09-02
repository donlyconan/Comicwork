<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comicwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var Comicwork
     */
    private $comicworks;

    public function __construct(Comicwork $comicworks)
    {
        $this->comicworks = $comicworks;
    }

    public function index()
    {
        $users = $this->comicworks->where("name", "Doreamon")->get();
        dd($users);
        return $users->name;
//        return view('hello', compact('users'));
    }


    public function getName($name)
    {
        echo "Name: $name";
    }

    public function postFile(Request $request)
    {
        if ($request->hasFile("myfile")) {
            $file = $request->file('myfile');
            $file->move('image', $file->getClientOriginalName());
            return "Upload successful!";
        } else {
            return "Chua co file";
        }
    }


    public function getView($name)
    {
        $chapter = Chapter::find(1);
        dd($chapter);
        return view('hello', ['name' => $name]);
    }
}
