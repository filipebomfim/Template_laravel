<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $credentials = $request->all(['email','password']);

        //autenticação
        $token = auth('api')->attempt($credentials);
        
        return $token ? 
                response()->json(['token'=>$token],200) 
                : 
                response()->json(['erro'=>'Usuário ou senha inválidos!'],403);
        
    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['mensagem'=>'Logout realizado com sucesso!']);
    }

    public function refresh(){
        $token = auth('api')->refresh();
        return response()->json(['token'=>$token]);
    }

    public function me(){
        return response()->json(auth()->user());
    }
}
