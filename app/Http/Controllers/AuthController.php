<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function Autenticate(User $user){
        $this->validate($this->request,[
            'login' => 'required',
            'pswd' => 'required'
        ],[
            'required' => 'El campo :attribute es requerido para autenticacion del usuario.'
        ]);

        $user = User::where('login', $this->request->login)->where('pswd',$this->request->pswd)->first();

        if(!$user){
            return response()->json(['error' => 'Unauthorized','message' => 'Usuario no registrado'], 401);
        }

        return response()->json(['Token' => $this->GenerateToken($user)],400);

    }
    protected function GenerateToken(User $user){
        $payload = [
            'iss' => 'http://credimujer.com',
            'sub' => $user->email,
            'iat' => time(),
            'exp' => time() + 3600 ,
        ];
        return JWT::encode($payload,env('JWT_KEY'), 'HS256');
    }
    public function Users(){
        return ['users' => User::all()];
    }
}
