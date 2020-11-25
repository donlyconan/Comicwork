<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\MyStorage\FileSystem;
use App\MyStorage\Keyword;
use Illuminate\Http\Request;

class SuggestController extends Controller
{


    public function index(Request $request)
    {
        $q = $request->q;

        if ($q != null) {
            $keyword = new Keyword($q);
            $result = collect();

            //1. Duyệt danh sách truyện
            $rawData = Comicwork::cursor()->filter(function ($comic) use ($q, $keyword) {
                return $keyword->calculate($comic->name) >= Keyword::COE
                    or $comic->tags()->where('label', "$q")->first() != null;
            })->take(15);

            foreach ($rawData as $item) {
                $data = [
                    'url_image' => FileSystem::asset($item->url_image),
                    'name' => $item->name,
                    'views' => $item->views()->count(),
                    'url' => route('comic.info', ['id' => $item->id]),
                ];
                $result->add($data);
            }

            $data = [
                'empty' => $result->isEmpty(),
                'data' => $result,
            ];
            return response($data, 200);
        } else {
            return response(['empty' => true], 200);
        }

    }

}
