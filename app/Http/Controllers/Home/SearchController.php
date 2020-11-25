<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\Tag;
use App\MyStorage\Keyword;
use App\MyStorage\Paginator;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class SearchController extends Controller
{

    const MAX_ITEM_ON_PAGE = 24;

    /*
     * Duyệt bộ truyện và trả về loại danh sách bộ truyện có khả năng
     * cao liên quan tới từ khoá ở 2 danh mục thể loại và tên bộ truyện
     * Phương pháp: sử dụng cursor cho vòng để tiết kiệm tài nguyên
     */
    public function search(Request $request)
    {
        $this->validate($request, ['q' => 'required']);
        $q = $request->q;
        $keyword = new Keyword($q);

        //1. Duyệt danh sách truyện
        $dataFilter = Comicwork::cursor()->filter(function ($comic) use ($q, $keyword) {
                return $keyword->calculate($comic->name) >= Keyword::COE or
                    $comic->tags()->where('label', "$q")->first() != null;
        })->sort(function ($u, $v) use ($keyword) {
            return $keyword->calculate($v->name) - $keyword->calculate($u->name);
        });

        $action = null;
        $comics = Paginator::paginate($dataFilter, route('home.search', compact('q')), self::MAX_ITEM_ON_PAGE);
        $title = "Kết quả tìm kiếm cho: $q";
        return view('home.category.general')->with(compact('comics', 'title', 'action'));
    }

    /*
     * Trả về danh sách truyện sau khi duyệt
     * - Duyệt: thời gian, danh mục, thể loại, đất nước, sắp xếp
    */
    public function browser(Request $req)
    {
        $category = (int)$req->category;
        $sort = (int)$req->sort;
        $status = (int)$req->status;
        $country = (int)$req->country;
        $time = (int)$req->time;

        $rawdata = Comicwork::cursor()->filter(function ($comic) use ($country, $time, $category, $status) {
            $result = true;
            if ($status != 0)
                $result &= $comic->status == $status;
            if ($category != 0)
                $result &= $comic->tags()->where('id', $category)->first() != null;
            if ($country != 0)
                $result &= $comic->country()->first()->id == $country;
            if ($time != 0)
                $result &= $time == (int)date('Y', strtotime($comic->publishing_year));
            return $result;
        })->sort(function (Comicwork $u, Comicwork $v) use ($sort) {
            if ($u->latest() == null || $v->latest() == null)
                return 0;
            else if ($sort == 0)
                return strtotime($u->latest()->release_date) - strtotime($v->latest()->release_date);
            else if ($sort == 1)
                return strtotime($u->created_at) - strtotime($v->created_at);
            else if ($sort == 2)
                return date('Y', strtotime($v->publishing_year)) - date('Y', strtotime($u->publishing_year));
        });

        session(compact('category', 'sort', 'country', 'time', 'status'));

        $url = route('home.browser', compact('category', 'sort', 'country', 'time', 'status'));
        $comics = Paginator::paginate($rawdata, $url, self::MAX_ITEM_ON_PAGE);
        $title = 'Kết quả duyệt truyện';
        return view('home.category.filter')->with(compact('comics', 'title'));// ->withInput();
    }


    /*
     * Tải danh sách truyện dựa trên thể loại dành cho con trai hoặc con gái
     * Value: 0 -> dành cho giới tính nam
     * Value: 1 -> dành cho giới tính nữ
     */
    public function forBoy(Request $request, $sexs)
    {
        $data = Comicwork::cursor()->filter(function ($comic) use ($sexs) {
            $tag = $comic->tags()->where('forboy', $sexs == 'con-trai' ? 0 : 1)->first();
            return $tag;
        })->sortBy('name');
        $comics = Paginator::paginate($data, $request->url(), self::MAX_ITEM_ON_PAGE);
        $title = 'Truyện ' . ($sexs ? 'Con Gái' : 'Con Trai');
        return view('home.category.general')->with(compact('comics', 'title'));
    }


}
