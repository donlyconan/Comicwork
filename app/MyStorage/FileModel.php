<?php

namespace App\MyStorage;


use App\Model\Comicwork;
use App\Model\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Exception;

/**
 * - Lớp FileModel là một lớp cho phép người dùng hay Admin tác động trực tiếp đồng thời
 * lên một Model và cả bộ nhớ trong nơi lưu trữ tệp tin của chương trình
 * @author Donly Conan
 * Class FileModel
 * @package App\MyStorage
 */
class FileModel
{
    /**
     * Thay đổi ảnh đại diện của một Bộ truyện
     */
    public static function changeComicworkProfile($id, UploadedFile $file)
    {
        $comic = Comicwork::findOrFail($id);
        $comic->url_image = FileSystem::getFolderComicwork()->save("profile", $file);
        $comic->save();
    }


    /**
     * Thay đổi ảnh đại diện của một User
     */
    public static function changeUserProfile($id, UploadedFile $file)
    {
        $user = User::findOrFail($id);
        $user->url_image = FileSystem::getFolderUser()->save('profile', $file);
        $user->save();
    }


    /**
     * Lưu toàn 1 mảng file vào bộ nhớ
     * Lưu đường dẫn của file từ bộ nhớ vào DB
     */
    public static function addNewChapter($id_comic, $id_chapter, $files)
    {
        $path = "$id_comic/$id_chapter";

        foreach ($files as $file) {
            $url_image = FileSystem::getFolderComicwork()->save($path, $file, true);
            Image::insert([
                'url_image' => $url_image,
                'id_chapter' => $id_chapter
            ]);
        }
    }

    /**
     * Thay thế URL của một Model ảnh bằng một file tương ứng
     */
    public static function replaceImage($id, UploadedFile $file)
    {
        $image = Image::findOrFail($id);
        $id_chapter = $image->id_chapter;
        $id_comic = $image->chapter()->id_comicwork;

        $path = "$id_comic/$id_chapter";
        $image->url_image = FileSystem::getFolderComicwork()->save($path, $file, true);
        $image->save();
    }


    /**
     * Load anh tu model image va sap xep theo thu tu a,b,c
     */
    public static function loadImages($id_chapter, $mode = 'asc')
    {
        $urls = Image::where('id_chapter', $id_chapter)->get('url_image');

        $urls = $urls->sort(function ($urla, $urlb) use ($mode) {
            try {
                $nA = (int)\File::name($urla);
                $nB = (int)\File::name($urlb);

                if ($mode == 'asc') {
                    return $nA - $nB;
                } else {
                    return $nB - $nA;
                }
            } catch (Exception $e) {
                return 1;
            }
        });

        return $urls;
    }

    public static function instanceChapter()
    {
        $urls = FileSystem::getFolderComicwork()
            ->get('test')->get('chapter')->listFiles();
        $images = new Collection();
        foreach ($urls as $url) {
            $image = new Image();
            $image->url_image = $url;
            $images->add($image);
        }
        return $images;
    }

    /**
     * Kiem tra danh sach file co phai la ảnh
     */
    public function isImage(UploadedFile ...$files): bool
    {
        foreach ($files as $file) {
            if (!Regex::getExtentionImage() . contains($file->getClientOriginalExtension())) {
                return false;
            }
        }
        return true;
    }

}



