<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Chapter;
use App\Model\Comicwork;
use App\MyStorage\FileSystem;
use App\MyStorage\Paginator;
use App\MyStorage\Regex;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use function Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    const PAGINATION = 24;


    //kiểm tra xác thực
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");
    }

    //tra ve thong tin user
    public function index()
    {
        $user = \Auth::user();
        return view('home.user.user&info')->with("user", $user);
    }


    //tra ve danh sach lich su doc truyen cua user
    public function history()
    {
        $items = \DB::table('histories')->select(['id_chapter', 'id_comicwork'])
            ->where('id_user', \Auth::id())
            ->orderBy('updated_at', 'desc')->get();

        $data = new Collection();

        foreach ($items as $item) {
            $comic = Comicwork::find($item->id_comicwork);
            $chapter = Chapter::find($item->id_chapter);
            $comic->current_chapter = $chapter;
            $data->add($comic);
        }

        $title = "Lịch sử đọc truyện";
        $comics = Paginator::paginate($data);
        $action = 1;
        return view('home.category.general')->with(compact('comics', 'title', 'action'));
    }


    // Tra lich su theo doi cua user do
    public function follow()
    {
        $items = \DB::table('follows')->select(['id_comicwork'])
            ->where('id_user', \Auth::id())
            ->orderBy('created_at', 'desc')->get();

        $data = new Collection();

        foreach ($items as $item) {
            $comic = Comicwork::find($item->id_comicwork);
            $data->add($comic);
        }

        $title = 'Truyện đang theo dõi';
        $comics = Paginator::paginate($data);
        $action = 0;
        return view('home.category.general', compact('title', 'comics', 'action'));
    }


    //Chinh sua thong tin user
    public function edit(Request $request)
    {
        $this->validate($request, [
            "full_name" => "required|regex:" . Regex::getRegexFullname(),
        ], [
            'full_name.regex' => 'Họ tên không hợp lệ',
            'full_name.required' => 'Bạn chưa nhập họ tên',
        ]);

        if($request->phone) {
            $this->validate($request, [
                'phone' => "required|regex:" . Regex::getRegexPhoneNumber()
            ], [
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'phone.required' => 'Bạn chưa nhập số điện thoại'
            ]);
        } else if($request->address) {
            $this->validate($request, [
                "address" => "required|min:2|max:250",
            ], [
                'address.regex' => 'Địa chỉ không hợp lệ',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'address.min' => 'Địa chỉ phải lớn hơn ít nhất 2 ký tự',
                'address.max' => 'Địa chỉ không được vượt quá 250 ký tự',

            ]);
        }


        $user = \Auth::user();

        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->sexs = $request->gender;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $this->validate($request, ['image.*' => 'file|mimes:' . Regex::getExtentionImage()], [
                'image.mimes' => 'Định dạng tệp tin không được cho phép',
                'images.file' => 'Không định dạng được tệp tin']);

            $user->url_image = FileSystem::getFolderUser()->save('profile', $file);
        }

        $user->save();
        $notify = 'Cập nhật thông tin tài khoản thành công';

        return back()->with(compact('user', 'notify'));
    }


    // Dang xuat user
    public function logout()
    {
        //Vô hiệu hoá Passport
        if(\Auth::user()->token() != null)
            \Auth::user()->token()->revoke();
        //Xoá session
        \Cookie::forget('access-token');
        \Auth::logout();
        return redirect()->route('login');
    }
}
