<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\Follow;
use App\Model\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{


    /*
     * Huỷ theo dõi hoặc theo dõi 1 bộ truyện
     * 1. Nếu trang bộ truyện đang được theo dõi -> Huỷ theo dõi
     * 2. Ngược lại là theo dõi
     */
    public function handle(Request $request)
    {
        $id_user = $request->user()->id;
        $id_comic = $request->id_comic;

        //kiem tra ton tai
        $comic = Comicwork::findOrFail($id_comic);
        $follow = Follow::where('id_user', $id_user)->where('id_comicwork', $id_comic);
        $numberOfFollows = $comic->follows()->count();

        // Kiem tra tinh trang follow
        if ($follow->first() == null) {
            //Chua theo doi
            $res = Follow::insert([
                'id_user' => $id_user,
                'id_comicwork' => $id_comic
            ]);
            $data = [
                'success' => 'Đã theo dõi ' . $comic->name,
                'followed' => $res,
                'number' => $numberOfFollows + 1
            ];
            return \Response::json($data, 201);
        } else {
            // Neu dang theo doi
            $res = $follow->delete();
            $data = [
                'success' => 'Đã huỷ theo dõi ' . $comic->name,
                'followed' => !$res,
                'number' => $numberOfFollows - 1
            ];
            return \Response::json($data, 200);
        }
    }

}
