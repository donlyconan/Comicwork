<?php

namespace App\MyStorage;


use App\Model\Comicwork;
use App\Model\Image;
use GuzzleHttp\Psr7\UploadedFile;

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
     * @param $table
     * @param UploadedFile $file
     * @return mixed
     */
    public static function changeComicworkProfile($id, UploadedFile $file)
    {
        $comic = Comicwork::findOrFail($id);
        $comic->url_image = FileSystem::getFolderComicwork()->save("profile", $file);
        $comic->save();
    }


    /**
     * Thay đổi ảnh đại diện của một User
     * @param $table
     * @param UploadedFile $file
     * @return mixed
     */
    public static function changeUserProfile($id, UploadedFile $file)
    {
        $user = User::findOrFail($id);
        $user->url_image = FileSystem::getFolderUser()->get("profile")->save($id, $file);
        $user->save();
    }


    /**
     * Lưu toàn bộ ảnh của một chapter vào bộ nhớ và database
     */
    public static function addNewChapter($id_comic, $id_chapter, array $files)
    {
        $path = "$id_comic/$id_chapter";

        foreach ($files as $file) {
            $image = new Image();
            $image->url_image = FileSystem::getFolderComicwork()->save($path, $file, true);
            $image->id_chapter = $id_chapter;
            $image->save();
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

}



