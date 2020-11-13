<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Comicwork;
use App\Model\ComicworkTag;
use App\Model\Country;
use App\Model\Tag;
use App\MyStorage\FileModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ComicworkController extends Controller
{
    private $comicwork;
    private $country;
    private $tag;
    private $comicworkTag;

    private $countryOptions;
    private $tagOptions;

    /**
     * ComicworkController constructor.
     */
    public function __construct(Comicwork $comicwork, Country $country, Tag $tag
        , ComicworkTag $comicworkTag)
    {
        $this->comicwork = $comicwork;
        $this->country = $country;
        $this->tag = $tag;
        $this->comicworkTag = $comicworkTag;
    }

    public function index()
    {
//        $data = $this->comicwork->where('deleted_at', null, null)->paginate(5);
        $data = $this->comicwork->all();
        return view('admin.comicworks.index', ['data' => $data]);
    }

    public function create()
    {
        $this->makeOptions();
        $countries = $this->country->all();
        return view('admin.comicworks.create', ['countryOptions' => $this->countryOptions, 'tagOptions' => $this->tagOptions, 'countries' => $countries]);
    }


    public function store(ComicworkStoreRequest $request)
    {
        /**
         * Database Transaction
         * Laravel Eloquent
         */
        try {
            DB::beginTransaction();
            /**
             * Insert to Comicworks
             */
            $dataComicwork = [
                'name' => $request->name,
                'description' => $request->description,
                'id_country' => $request->id_country,
                'author' => $request->author,
                'publishing_company' => $request->publishing_company,
                'publishing_year' => date("Y-m-d H:i:s", strtotime($request->publishing_year)),
                'url_image' => FileModel::uploadComicworkProfile($request->file('url_image')),
//                'forboy' => $request->forboy,
            ];
//            if (empty($dataComicwork['forboy'])) {
//                $dataComicwork['forboy'] = 0;
//            } else {
//                $dataComicwork['forboy'] = 1;
//            }

            $comicworkInstance = $this->comicwork->create($dataComicwork);

            /**
             * Insert to Tags
             * Insert to Comicwork_Tag
             * Use FirstOrCreate
             */
            $dataTag = $request->tags;
            foreach ($dataTag as $tagItem) {
                $tagInstance = $this->tag::firstOrCreate([
                    'label' => $tagItem,
                ]);
                $tagIds[] = $tagInstance->id;
            }
            /**
             * attach() tự động lấy id của comicworkInstance và id trong $tagIds để insert vào ComicworkTag
             */
            $comicworkInstance->tags()->attach($tagIds);

            DB::commit();
//            dd($dataComicwork, $dataTag);
            return redirect()->route('admin.comicworks.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }


    public function edit($id)
    {
        $comicwork = $this->comicwork->find($id);
        $countries = $this->country->all();
        $tags = $this->tag->all();
        return view('admin.comicworks.edit', ['comicwork' => $comicwork, 'countries' => $countries, 'tags' => $tags]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            /**
             * Update Comicwork
             */
            $comicwork = $this->comicwork->find($id);

            $dataComicworkUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'id_country' => $request->id_country,
                'author' => $request->author,
                'publishing_company' => $request->publishing_company,
                'publishing_year' => date("Y-m-d H:i:s", strtotime($request->publishing_year)),
//            'url_image' => FileModel::uploadComicworkProfile($request->file('url_image')),
//                'forboy' => $request->forboy,
            ];
            if (!empty($request->file('url_image'))) {
                $dataComicworkUpdate['url_image'] = FileModel::uploadComicworkProfile($request->file('url_image'));
            }
//            if (empty($dataComicworkUpdate['forboy'])) {
//                $dataComicworkUpdate['forboy'] = 0;
//            } else {
//                $dataComicworkUpdate['forboy'] = 1;
//            }

            $resultComicworkUpdate = $comicwork->update($dataComicworkUpdate);

            /**
             * Insert Tag nếu có tag mới
             * Khi dùng get() -> nhận được collection nên cần truy cập thông qua chỉ mục [0] hoặc first()
             */
            $dataTag = $request->tags;

            foreach ($dataTag as $item) {
                $tagInstance = $this->tag->firstOrCreate([
                   'label' => $item,
                ]);
                // $idTags[] = $tagInstance->id
                $idTags[] =  $this->tag->where('label', $item)->get()->first()->id;
            }

            /**
             * Update ComicworkTag, use Sync method
             * sync method nhận vào một mảng các id, bất kì id nào nằm ngoài mảng id truyền vào sẽ bị xóa khỏi bảng trung gian
             * tuy nhiên dùng sync thì không softDelete được
             *
             */
            $comicwork->tags()->sync($idTags);

            DB::commit();
            return redirect()->route('admin.comicworks.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }



    public function show($id){
        $comicwork = $this->comicwork->find($id);
        $chapters = $comicwork->chapters->take(1)->first();

        if ($chapters != null){
            $images = $chapters->images->take(9);
        } else{
            $images = new Collection();
        }
        foreach ($images as $imageItem){
            $imageItem->url_image = "storage/" . $imageItem->url_image;
        }

        return view('admin.comicworks.show', ['comicwork' => $comicwork, 'images' => $images]);
    }

    public function destroy($id)
    {
        try{
//            $resultComicworkDestroy = $this->comicwork->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        }catch (\Exception $exception){
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fialure',
            ], 500);
        }

//        $resultComicworkDestroy = $this->comicwork->find($id)->delete();
//        return redirect()->route('admin.comicworks.index');
    }


    /**
     * make countryOptions
     * make tagOptions
     */
    public function makeOptions()
    {
        $this->countryOptions = '';
        $this->tagOptions = '';
        $data = $this->country->all();
        foreach ($data as $row) {
            $this->countryOptions .= "<option value= '" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        $data = $this->tag->all();
        foreach ($data as $row) {
            $this->tagOptions .= "<option value = '" . $row['label'] . "'> " . $row['label'] . "</option>";
        }
    }
}
