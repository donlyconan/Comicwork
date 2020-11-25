<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Notification;
use App\Render\NotificationRender;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class NotificationController extends Controller
{
    const PER_PAGE = 15;

    /**
     * Tải thông báo của người dùng
     */
    public function load(Request $request)
    {
        $from = $request->from;
        $rawdata = Notification::where('id_user', $request->user()->id)
            ->get()->sortByDesc('updated_at')
            ->skip($from)->take(self::PER_PAGE);

        $listRender = new Collection();
        foreach ($rawdata as $item) {
            $render = NotificationRender::render($item);
            $listRender->add($render);
        }
        $from = $from + self::PER_PAGE;

        return response(compact('listRender', 'from'), 200);
    }


    /**
     * Đánh dấu thông báo đã được xem
     */
    public function seen(Request $req)
    {
        $id_user = $req->user()->id;
        $id_comment = $req->id_comment;

        if ($id_comment == -1) {
            Notification::where('id_user', $id_user)
                ->where('status', '=', 0)
                ->update('status', 1);

            return response(null, 204);
        } else {
            Notification::find($id_comment)->update('status', 1);
            return response(null, 204);
        }
    }
}
