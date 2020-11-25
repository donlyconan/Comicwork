<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\Comment;
use App\Model\Notification;
use App\Model\User;
use App\MyStorage\Paginator;
use App\Render\NotificationRender;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Integer;
use function GuzzleHttp\json_encode;

class CommentController extends Controller
{
    const IS_PARENT = 0;
    const PER_PAGE = 15;

    /**
     * Trả về 15 comment cha và các toàn bộ con của nó của 1 bộ truyện
     * @param $id_comic
     * @param $from
     */
    public function load(Request $req)
    {
        $from = $req->from;
        $owner = $req->id_user ?? 0;
        $id_comic = $req->id_comic;


        //Tải 15 comment cha từ vị trí [form ,to]
        $parents = Comment::where('id_comicwork', $id_comic)
            ->where('id_parent', 0)
            ->orderBy('id', 'desc')
            ->skip($from)->take(self::PER_PAGE)->get();

        $listRender = new Collection();

        foreach ($parents as $parent) {
            $htmlParent = view('include.item-comment', [
                'owner' => $owner,
                'comment' => $parent
            ])->render();
            $listRender->add($htmlParent);

            foreach ($parent->children()->get() as $child) {
                $htmlRender = view('include.item-comment', [
                    'owner' => $owner,
                    'comment' => $child
                ])->render();
                $listRender->add($htmlRender);
            }
        }

        $from = $listRender->isEmpty() ? -1 : $from + self::PER_PAGE;
        return response(compact('listRender', 'from', 'id_comic'), 200);
    }

    /*
     * tạo 1 bình luận : id_user, id_comic, content
     * Binh luan duoc tao ra la 1 nhanh chinh va khong lien quan den cac binh luan khac
     */
    public function post(Request $req)
    {
        $comment = new Comment();
        $comment->id_user = $req->user()->id;
        $comment->id_comicwork = $req->id_comic;
        $comment->content = $req->get('content');
        $comment->save();

        $owner = $req->id_user;
        $htmlRender = view('include.item-comment', compact('comment', 'owner'))->render();
        $action = 'comment';
        return response(compact('htmlRender', 'action'), 201);
    }

    /*
     * tạo 1 bình luận mang tính chất trả lời 1 bình luận khác: $id_user, id_parent, content
     * Xu ly 2 truong hop:
     * 1. Comment reply la comment cha
     * 2. Comment reply la 1 nhanh cua comment khac
     * 3. Xử lý thêm thông báo cho nội dung được thêm vào
     */
    public function reply(Request $req)
    {
        $user = $req->user();
        $parent = Comment::findOrFail($req->id_parent);

        //2. Comment reply là 1 nhánh của comment khác
        $id_parent = $parent->isParent() ? $parent->id : $parent->id_parent;

        $comment = new Comment();
        $comment->id_user = $user->id;
        $comment->content = $req->get('content');

        $comment->id_comicwork = $parent->id_comicwork;
        $comment->id_parent = $id_parent;
        $comment->id_reply = $parent->id_user;
        $comment->save();

        //3. Thêm thông báo
        $noti = new Notification();
        $noti->id_user = $comment->id_reply;
        $noti->content = json_encode([
            'id_user' => $user->id,
            'id_comic' => $parent->id_comicwork,
            'action' => NotificationRender::NOTI_REPLY
        ]);
        $noti->save();

        $owner = $req->id_user;
        $htmlRender = view('include.item-comment', compact('comment', 'owner'))->render();
        $action = 'reply';
        $id_reply = $parent->id;
        return response(compact('htmlRender', 'action', 'id_reply'), 201);
    }

    /*
     * Xoá 1 bình luận: id
     * 1. Xoá các nhánh con của bình luận đó
     * 2. Xoá bản thân nó
     */
    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        //1. Xoá nhánh con
        Comment::where('id_parent', $id)->delete();

        //2. Xoá nhánh cha
        $comment->delete();

        return response(['success' => 'Đã xoá bình luận', 'id' => $id], 204);
    }
}
