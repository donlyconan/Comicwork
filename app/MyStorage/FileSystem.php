<?php

namespace App\MyStorage;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/*
 * - Xây dựng độ tương tác các file với thư mục
 * - Xây độ tương tác giữa các thư mục
 * - Xây dựng độ tương tác giữa các thư mục với file
 */

//ĐỊnh nghĩa đường dẫn folder gốc
const ROOT_FOLDER = 'public/';

//Định nghĩa đường dẫn  lưu truyện
const ROOT_COMICWORK = 'public/comicwork';

//Định nghĩa đường dẫn file người dùng
const ROOT_USER = 'public/user';


/**
 * @property exist()
 * @extends File
 * Class FileSystem
 * @package App\Core
 */
class FileSystem implements FileScript
{
    private static $FOLDER_ROOT;
    private static $FOLDER_USER;
    private static $FOLDER_COMICWOK;

    private $parent;
    private $pathname;

    public function __construct($pathname)
    {
        $this->pathname = $pathname;
    }


    public function parent(): FileSystem
    {
        if ($this->parent == null) {
            $path = File::dirname($this->pathname);
            $this->parent = new FileSystem($path);
        }
        return $this->parent;
    }

    public function get($filename): FileSystem
    {
        $path = $this->pathname . '/' . $filename;
        if (Storage::exists($path)) {
            return new FileSystem($path);
        }
//        throw new FileNotFoundException('Không tìm thấy file: ' . $filename);
    }


    public function children(): array
    {
        $list = array();

        foreach (Storage::files($this->pathname) as $file) {
            $fileSystem = new FileSystem($file);
            array_push($list, $fileSystem);
        }

        foreach (Storage::directories($this->pathname) as $file) {
            $fileSystem = new FileSystem($file);
            array_push($list, $fileSystem);
        }
        return $list;
    }

    public function getAll($filename): array
    {
        $list = array();
        foreach (Storage::allFiles($this->pathname) as $file) {
            if (File::basename($file) == $filename) {
                array_push($list, new FileSystem($file));
            }
        }
        return $list;
    }

    public function listFiles($filter = null): array
    {
        $listFiles = $this->listAllFiles();

        if ($filter != null) {
            $newListFiles = array();
            foreach ($listFiles as $file) {
                if ($filter($file)) {
                    array_push($newListFiles, $file);
                }
            }
            return $newListFiles;
        }
        return $listFiles;
    }


    public function listAllFiles(): array
    {
        $listFiles = array();
        $dirs = Storage::allDirectories($this->pathname);
        $files = Storage::allFiles($this->pathname);

        $listFiles = array_merge($listFiles, $dirs);
        $listFiles = array_merge($listFiles, $files);
        return $listFiles;
    }


    public function deleteAll($filter): int
    {
        $total = 0;
        foreach ($this->listAllFiles() as $file) {
            if ($filter($file)) {
                $total += Storage::delete($file) | Storage::deleteDirectory($file) ? 1 : 0;
            }
        }
        return $total;
    }

    public function delete($filename): bool
    {
        if ($filename == null) {
            return Storage::delete($this->pathname) | Storage::deleteDirectory($this->pathname);
        } else {
            $path = $this->pathname . '/' . $filename;
            return Storage::delete($path) | Storage::deleteDirectory($path);
        }
    }

    public function save(string $folder, UploadedFile $file, $rootName = false): string
    {
        $newFolder = $this->pathname;
        if ($folder != null) {
            $newFolder .= '/' . $folder;

            if (!Storage::exists($newFolder))
                Storage::makeDirectory($newFolder);
        }

        //neu folder la 1 file
        if (File::isFile($newFolder)) {
            $newFolder = dirname($newFolder);
        }

        $filename = $file->getClientOriginalName();

        if (!$rootName) {
            $filename = \Str::random(40) . '.' . $file->getClientOriginalExtension();
            while (Storage::exists($newFolder . '/' . $filename)) {
                $filename = \Str::random(40) . '.' . $file->getClientOriginalExtension();
            }
        }

        return \Storage::putFileAs($newFolder, $file, $filename);
    }

    public function saveAll(string $folder, array $files, $rootName = false): array
    {
        $listPath = array();
        foreach ($files as $file) {
            array_push($listPath, $this->save($folder, $file, $rootName));
        }
        return $listPath;
    }

    public function length()
    {
        return Storage::size($this->getPath());
    }

    public function exists(): bool
    {
        return Storage::exists($this->getPath());
    }

    public function isFile(): bool
    {
        return File::isFile($this->getPath());
    }

    public function mkdirs($pathname)
    {
        $path = $this->pathname . '/' . $pathname;
        Storage::makeDirectory($path);
    }


    public function url(): string
    {
        return Storage::url($this->pathname);
    }

    public function getPath(): string
    {
        return $this->pathname;
    }


    public function name(): string
    {
        return File::name($this->pathname);
    }

    public function move($fs): bool
    {
        return Storage::move($this->pathname, $fs->pathname);
    }


    /**
     * Tạo thư mục với các đường dẫn trên nếu chúng chưa tồn tại
     */
    public static function makeIfNotExists()
    {
        return Storage::makeDirectory(ROOT_FOLDER)
            && Storage::makeDirectory(ROOT_COMICWORK)
            && Storage::makeDirectory(ROOT_USER);
    }


    public static function asset($pathname)
    {
        $path = Storage::url($pathname);
        return asset($path);
    }


    public static function create($path): FileSystem
    {
        return new FileSystem($path);
    }

    /**
     * Tạo thư mục đối tượng cha
     * @return mixed
     */
    public static function getFolderRoot(): FileSystem
    {
        if (FileSystem::$FOLDER_ROOT == null) {
            FileSystem::$FOLDER_ROOT = new FileSystem(ROOT_FOLDER);
        }
        return FileSystem::$FOLDER_ROOT;
    }

    /**
     * Tạo thư mục đối tượng Comicwork
     * @return mixed
     */
    public static function getFolderComicwork(): FileSystem
    {
        if (FileSystem::$FOLDER_COMICWOK == null) {
            FileSystem::$FOLDER_COMICWOK = new FileSystem(ROOT_COMICWORK);
        }
        return FileSystem::$FOLDER_COMICWOK;
    }

    /**
     * Tạo thư mục đối tượng User
     * @return mixed
     */
    public static function getFolderUser(): FileSystem
    {
        if (FileSystem::$FOLDER_USER == null) {
            FileSystem::$FOLDER_USER = new FileSystem(ROOT_USER);
        }
        return FileSystem::$FOLDER_USER;
    }


}


