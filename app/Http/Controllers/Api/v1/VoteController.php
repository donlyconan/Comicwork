<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{


    /**
     * Dang ki thic mot bo truyen hoac huy bo yeu thich
     */
    public function handle(Request $request)
    {
        $id_user = $request->user()->id;
        $id_comic = $request->id_comic;

        //kiem tra ton tai
        $comic = Comicwork::findOrFail($id_comic);
        $vote = Vote::where('id_user', $id_user)->where('id_comicwork', $id_comic);
        $numberOfVotes = $comic->votes()->count();


        //kiem tra tinh trang follow
        if ($vote->first() == null) {
            //Chua theo doi
            $res = Vote::insert([
                'id_user' => $id_user,
                'id_comicwork' => $id_comic
            ]);
            $data = [
                'success' => 'Đã thích ' . $comic->name,
                'voted' => $res,
                'number' => $numberOfVotes + 1
            ];
            return \response($data, 201);
        } else {
            $res = $vote->delete();
            //neu dang theo doi
            $data = [
                'success' => 'Đã huỷ thích ' . $comic->name,
                'voted' => !$res,
                'number' => $numberOfVotes - 1
            ];
            return response($data, 200);
        }
    }


}
