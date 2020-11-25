<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Country;
use Illuminate\Support\Facades\Session;
use Laravel\Passport\Passport;

class CountryController extends Controller
{

    //Tim kiem truyen theo danh muc quoc gia
    public function country($id)
    {
        $country = Country::findOrFail($id);
        $comics = $country->comicworks()->paginate(HomeController::PERPAGE)
            ->withPath("country/" . $id);
        $title = 'Truyện tranh: ' . $country->name;

        Session::put('country', $id);
        Session::forget(['status', 'time', 'sort', 'category']);

        return view('home.category.filter')->with(compact('title'))
            ->with(compact('comics'));
    }

}
