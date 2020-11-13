<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    private $country;

    /**
     * CountryController constructor.
     */
    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    public function index(){
//        $data = DB::table('countries')->where('deleted_at', null, null)->paginate(5);
        $data = $this->country->all();
        return view('admin.countries.index', ['data' => $data]);
    }

    public function create(){
        return view('admin.countries.create');
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();

            $dataCountry = [
                'name' => $request->name,
            ];
            $countryInstance = $this->country->create($dataCountry);


            DB::commit();
            return redirect()->route('admin.countries.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }

    }

    public function edit($id){
        $data = $this->country->find($id);
        return view('admin.countries.edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $country = $this->country->find($id);
            $dataCountryUpdate = [
              'name' => $request->name,
            ];
            $result = $country->update($dataCountryUpdate);

            DB::commit();
            return redirect()->route('admin.countries.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }

    public function show($id){

    }

    public function destroy($id){
        try{
//            $result = $this->country->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        }catch (\Exception $exception){
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failure',
            ], 500);
        }
    }
}
