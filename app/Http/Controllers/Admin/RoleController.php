<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{

    private $role;
    /**
     * RoleController constructor.
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index(){
//        $data = Role::all()->where('id', '>=', 1)->forPage(2, 1);
//        $data = DB::table('roles')->where('deleted_at', null, null)->paginate(5);
        $data = $this->role->all();
        return view('admin.roles.index', ['data' => $data]);
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){

        try{
            DB::beginTransaction();

            $dataRole = [
                'name' => $request->name,
                'display_name' => $request->display_name,
            ];

            $roleInstance = $this->role->create($dataRole);

            DB::commit();
            return redirect()->route('admin.roles.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }

    public function edit($id){
        $data = $this->role->find($id);
        return view('admin.roles.edit', ['data' => $data]);
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $role = $this->role->find($id);

            $dataRole = [
                'name' => $request->name,
                'display_name' => $request->display_name,
            ];
            $result = $role->update($dataRole);


            DB::commit();
            return redirect()->route('admin.roles.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }

    public function show($id){

    }

    public function destroy($id){
        try{
//        $result = $this->role->find($id)->delete();
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
