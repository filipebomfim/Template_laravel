<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    //
    public function getAllUsers(){
        //$users = User::all();
        //return response()->json(['users'=>$users]);
        return UserResource::collection(User::all());
    }

    public function givePermission(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $role = Role::where('name','Administrador')->first();
        $user->assignRole($role);
        return UserResource::collection($user);
        //return response()->json(['user'=>$user]);
    }

    public function getUserRoles(){
        $user = User::where('id',Auth::user()->id)->first();
        //$roles = $user->getRoleNames();
        return RoleResource::collection($user->getRoleNames());
        //return response()->json(['roles'=>$roles]);
    }

}
