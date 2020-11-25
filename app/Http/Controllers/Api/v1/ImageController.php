<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Model\Chapter;
use App\MyStorage\FileModel;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //khu vuc chi danh cho admin
    public function __construct()
    {

    }

    public function upload(Request $request)
    {

        $images = $request->file('images');//('images');
        $id_comic = $request->id_comic;
        $id_chapter = $request->id_chapter;
        $chapter = Chapter::findOrFail($id_chapter);

        if ($images == null) {
            return response(['error' => 'Du lieu Null'], 200);
        }

        if ($chapter->id_comicwork != $id_comic) {
            return response(['error' => 'Không tồn tại khoá ngoại id-comic ' . $id_comic], 404);
        }

        FileModel::addNewChapter($id_comic, $id_chapter, $images);

        return response(['success' => 'Upload ảnh thành công'], 200);

    }
}
