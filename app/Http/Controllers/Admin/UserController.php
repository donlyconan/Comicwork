<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\User;
use App\MyStorage\FileModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    private $user;
    private $role;

    private $roleOptions;

    /**
     * UserController constructor.
     */
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        $users = $this->user->all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create(){
        $roles = $this->role->all();
        $this->makeOptions();
        return view('admin.users.create', ['roles' => $roles, 'roleOptions' => $this->roleOptions]);
    }

    public function store(UserStoreResquest $request){
        try{
            DB::beginTransaction();

            $dataUser = [
                'username' => $request->username,
                'password' => md5($request->password),
                'full_name' => $request->full_name,
                'email' => $request->email,
//                'sexs' => $request->sexs,
                'date_of_birth' => date("Y-m-d H:i:s", strtotime($request->date_of_birth)),
                'address' => $request->address,
                'phone' => $request->phone,
                'url_image' => FileModel::uploadUserProfile($request->file('url_image')),
            ];

            if(!empty($request->sexs)){
                $dataUser['sexs'] = 1;
            }else{
                $dataUser['sexs'] = 0;
            }
//            dd($dataUser, $dataRole);
            $userInstance = $this->user->create($dataUser);

            $dataRole = $request->roles;
            foreach($dataRole as $roleItem){
                $roleInstance = $this->role->firstOrCreate([
//                    'name' => $roleItem,
                    'display_name' => $roleItem,
                ]);

                $roleIds[] = $roleInstance->id;
            }

            $userInstance->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('admin.users.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }

    public function edit($id){
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $this->makeOptions();
        return view('admin.users.edit', ['user'=>$user, 'roles' => $roles, 'roleOptions'=>$this->roleOptions]);
    }

    public function update(UserUpdateResquest $request, $id){
        try{
            DB::beginTransaction();
            $user = $this->user->find($id);
            $dataUserUpdate = [
                'email' => $request->email,
                'username' => $request->username,
                'full_name' =>$request->full_name,
                'date_of_birth' => date('Y-m-d H:i:s', strtotime($request->date_of_birth)),
                'address' => $request->address,
                'phone' => $request->phone,

            ];

            if(!empty($request->sexs)){
                $dataUserUpdate['sexs'] = 1;
            }else{
                $dataUserUpdate['sexs'] = 0;
            }

            if(!empty($request->file('url_image'))){
                $dataUserUpdate['url_image'] = FileModel::uploadUserProfile($request->file('url_image'));
            }

            $result = $user->update($dataUserUpdate);

            $dataRole = $request->roles;
            foreach ($dataRole as $roleItem){
                $roleInstance = $this->role->firstOrCreate([
                    'display_name' => $roleItem,
                ]);
//                $roleIds[] = $roleInstance->id;
                $roleIds[] =  $this->role->where('display_name', $roleItem)->get()->first()->id;
            }

            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('admin.users.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . " ---Line: " . $exception->getLine());
        }
    }

    public function show($id){
        $user = $this->user->find($id);
        return view('admin.users.show', ['user' => $user]);
    }

    public function destroy($id){
        try{
//            $result = $this->user->find($id)->delete();
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
    }



    public function makeOptions(){
        $roles = $this->role->all();
        foreach ($roles as $roleItem){
            $this->roleOptions .= "<option value = '" . $roleItem['display_name'] . "'>" . $roleItem['display_name'] . "</option>";
        }
    }

}
