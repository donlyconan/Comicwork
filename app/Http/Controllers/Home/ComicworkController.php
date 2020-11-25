<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Chapter;
use App\Model\Comicwork;
use App\Model\Comment;
use App\Model\History;
use App\Model\Image;
use App\Model\Tag;
use App\Model\View;
use App\MyStorage\FileModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use PHPUnit\Exception;

class ComicworkController extends Controller
{

    /*
     * Thông tin truyện và danh sách chương
     */
    public function index($id)
    {
        $comic = Comicwork::findOrFail($id);

        //lấy danh sách truyện cùng thể loại
        $tags = $comic->tags()->get()->pluck(['id']);
        $sameKind = Comicwork::cursor()->filter(function ($comic) use ($tags) {
            return $comic->tags()->whereIn('id', $tags)->first() != null;
        })->take(6);

        //Danh sách chương truyện
        $listChapters = $comic->releasedChapters()
            ->whereDate('release_date', '<=', Carbon::now()->toDateTime())
            ->orderByDesc('chapter_number')
            ->get(['id', 'chapter_number', 'release_date']);

        //Lấy danh sách chapter
        $chapter = Chapter::findOrFail($comic->chapters->min('id'));
        $comments = $this->loadComments($id);
        $owner = \Auth::id();
        $from = 15;

        return view('home.comic.comic-info')
            ->with(compact('comic', 'sameKind', 'listChapters', 'chapter'
                , 'comments', 'owner', 'from'));
    }


    /*
     * Kiểm soát view:
     * View được tính bằng 1 request
     * Mỗi request phải cách nhau tối thiếu 10s
     */
    public function chapter($id, $chapter)
    {
        // Kiểm tra người dùng
        // Có 2 loại người dùng là: người dùng xác thực và người dùng ẩn danh
        $id_user = \Auth::check() ? \Auth::user()->id : -1;

        //Lấy danh sách truyện
        $listChapter = Chapter::where('id_comicwork', $id)
            ->whereDate('release_date', '<=', Carbon::now()->toDateTime())
            ->orderByDesc('chapter_number')
            ->get(['id', 'chapter_number', 'id_comicwork']);

        if (\Auth::check()) {
            History::updateOrInsert([
                'id_user' => $id_user, 'id_comicwork' => $id],
                ['id_chapter' => $chapter, 'updated_at'=>now()]
            );
        }

        //Tính view cho bộ truyện: thời gian tối thiểu để tăng thêm là 10s
        $res = session('time-reset') == null | session('id-comic') != $id | session('time-reset') <= time();

        if ($res) {
            //Thiết lập thời gian reset
            \Session::put('time-reset', time() + 5);
            \Session::put('id-comic', $id);
            View::insert(['id_comicwork' => $id, 'id_chapter' => $chapter, 'id_user' => $id_user]);
        }

        $images = Image::where('id_chapter', $chapter)->get('url_image')->sort(function ($u, $v) {
            try {
                $f = (int)\File::name($u);
                $l = (int)\File::name($v);
                return $f - $l;
            } catch (Exception $e) {
                return 1;
            }
        });
        $chapter = Chapter::findOrFail($chapter);

        //bo test anh cho
        if ($images->isEmpty()) {
            $images = FileModel::instanceChapter();
        }

        $comic = $chapter->comicwork()->first();
        $comments = $this->loadComments($comic->id);
        $owner = \Auth::id();
        $from = 15;

        return view('home.comic.chapter')->with(compact('comic', 'images', 'listChapter'
            , 'chapter', 'comments', 'owner', 'from'));
    }

    public static function loadComments($id_comic)
    {
        //Tải 15 comment cha từ vị trí [form ,to]
        $parents = Comment::where('id_comicwork', $id_comic)
            ->where('id_parent', 0)
            ->orderBy('id', 'desc')
            ->skip(0)->take(15)->get();
        $listItem = new Collection();


        foreach ($parents as $parent) {
            $listItem->add($parent);

            foreach ($parent->children()->get() as $child) {
                $listItem->add($child);
            }
        }
        return $listItem;
    }
}
