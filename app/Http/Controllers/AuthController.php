<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request){
        $this->validate($request,[
            'login' => 'required',
            'pswd' => 'required'
        ],[
            'required' => 'El campo :attribute es requerido para autenticacion del usuario.'
        ]);

        $user = User::where('login', $request->login)->where('pswd',$request->pswd)->first();

        if(!$user){
            return response()->json(['error' => 'Unauthorized','message' => 'Usuario no registrado'], 401);
        }
        $this->GenerateToken($user);

        return  response()->json($this->GenerateToken($user), 200);

    }
    protected function GenerateToken($user){
        $key = env('JWT_KEY');
        $payload = [
            'host' => 'http://credimujer.com',
            'Sub-Dominio' => 'http://aplativos.credimujer.com',
            'create_in' => time(),
            'expires_in' => time() + 3600 ,
            'User_Auth' => $user->email
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        
        return  ['message' => 'Login ok',
                    'dataToken' => [
                        'access_token' => $jwt,
                        'token_type' => 'bearer',
                        'create_in' => date("d/M/Y H:i:s",$payload['create_in']),
                        'expires_in' => date("d/M/Y H:i:><",$payload['expires_in'])
                    ]
                ];
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    }
    public function Users(){
        
    }
}
