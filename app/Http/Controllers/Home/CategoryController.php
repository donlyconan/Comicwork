<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    //Tim kiem truyen theo the loai
    public function category($id)
    {
        $categories = Tag::findOrFail($id);
        $comics = $categories->comicworks()->paginate(HomeController::PERPAGE);
        $comics->withPath("category?id=" . $id);
        $title = 'Thể loại: ' . $categories->label;

        \Session::put('category', $id);
        Session::forget(['status', 'time', 'sort', 'country']);

        return view('home.category.filter')
            ->with(compact('title', 'comics'));
    }

}
