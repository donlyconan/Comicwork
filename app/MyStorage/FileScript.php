<?php


namespace App\MyStorage;


/*
 * Đinh nghĩa tìm kiếm 1 tập hợp file
 * Bộ lọc
 */

use Illuminate\Http\UploadedFile;

interface Filter
{
    public function filter($file): bool;
}


/**
 * Xây dựng kịch bản cho hệ thống file lưu trữ và phân phối, sử dụng
 * Lớp kịch bản là 1 phần để mở rộng và phát triển hệ thống file
 * Lớp kịch bản bao gồm các chức năng cần thiết để xây dựng hệ thống file
 */
interface FileScript
{
    /**
     * Trả về lớp cha của file hiện tại
     * @return mixed
     */
    public function parent();


    /**
     * Trả về toàn bộ danh sách lớp con đầu tiên tìm được
     * @return mixed
     */
    public function children();


    /**
     * lấy file dự trên đường dẫn file chính nó nếu tên đối truyền vào là Null
     * Trả về một file trong danh sách file con nếu nó tồn tại
     */
    public function get($filename);


    /**
     * Trả về danh sách file con tồn có tên bằng $filename
     * @param $filename
     * @return mixed
     */
    public function getAll($filename);


    /**
     * Trả về danh sách đường dẫn các file con tìm được theo bộ lọc
     * @param $filter
     * @return mixed
     */
    public function listFiles($filter);


    /**
     * Kiểm tra thư mục hiện hành là 1 file
     * @return bool
     */
    public function isFile(): bool;


    /**
     * $filename = Null: Xoá bản thân file
     * $filename != null: Xoá file có tên $filename ở lớp con thứ nhất
     * @return mixed
     */
    public function delete($filename): bool;


    /**
     * Xoá tất cả lớp con được tìm thấy trong bộ lọc và khớp nằm trong thư mục cha
     * @param $filter
     * @return bool
     */
    public function deleteAll($filter): int;


    /**
     * Lưu 1 file vào trong thư mục storage
     * @param bool $rootName : lưu với tên là tên của file?
     * @param $file : File được cần lưu
     * @return string
     */
    public function save(string $folder, UploadedFile $file, $rootName = false): string;

    /**
     * Lưu mảmng file vào thư mục hiện hành
     * -Nếu thư mục hiện hành là 1 file tệp tin sẽ được lưu lại ở lớp cha của tệp tin này
     * @param mixed ...$files
     * @param null $folder
     * @return mixed
     */
    public function saveAll(string $folder, array $files, $rootName = false): array;


    /**
     * Trả về dung kích thước file
     * @return mixed
     */
    public function length();


    /**
     *Trả về tên file
     */
    public function name();

//    /**
//     * Trả về ngày tạo file
//     * @return mixed
//     */
//    public function createdAt();

    /**
     * Di chuyển file hiện tại đến thư mục $file
     * @param $file
     * @return mixed
     */
    public function move($fs): bool;

    /**
     * Tạo thư mục con trong thư mục hiện hành
     * @param $pathname
     * @return mixed
     */
    public function mkdirs($pathname);

    /**
     * Trả về 1 url có thời gian tồn tại $time phút
     * @param $time
     * @return mixed
     */
    public function url(): string;


    /**
     * Trả về đường dẫn hiện tại của file
     * @return mixed
     */
    public function getPath(): string;

    /**
     * Kiểm tra tệp tin hay thư mục có tồn tại không
     * @return bool
     */
    public function exists(): bool;

}
