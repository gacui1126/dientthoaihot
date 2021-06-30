<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class AdminRoleController extends Controller
{
    public function index(){
        $role = Role::paginate(10);
        return view('admin.page.roles.index',compact('role'));
    }
    public function create(){
        $permissionParent = Permission::where('parent_id',0)->get();

        return view('admin.page.roles.create',compact('permissionParent'));
    }
    public function store(Request $req){
        $role = Role::create([
            'name'=>$req->name,
            'auth_name'=>$req->auth_name
        ]);
        $role->permissions()->attach($req->id_permission);
        return redirect()->route('roles.index');
    }
    public function edit($id){
        $permissionParent = Permission::where('parent_id',0)->get();
        $role = Role::find($id);
        $perchecked = $role->permissions;
        return view('admin.page.roles.edit',compact('permissionParent','role','perchecked'));
    }

    public function update(Request $req, $id){
        $role = Role::find($id);
        $role->update([
            'name'=>$req->name,
            'auth_name'=>$req->auth_name
        ]);
        $role->permissions()->sync($req->id_permission);
        return redirect()->route('roles.index');
    }

    public function delete($id){
        try{
            $role = Role::find($id)->delete();
            return response()->json([
                'code' => 200,
                'massage' =>'update success',
            ], 200);
        }catch(\Exception $exception){
            log::error('Message: ' .$exception->getMessage() . '---line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'massage' =>'update fail',
            ], 500);
        }
    }
}
