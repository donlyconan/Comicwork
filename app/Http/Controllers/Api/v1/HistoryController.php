<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /*
     *  Xoá 1 bộ truyện khỏi lịch sử xem của người dùng
     */
    public function delete(Request $request)
    {
        $history = History::where('id_user', $request->id_user)
            ->where('id_comicwork', $request->id_comic)->first();

        if ($history != null) {
            $history->delete();
            return response(null, 204);
        } else {
            return response(null, 404);
        }

    }
}
