<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->header('Authorization')){
            return response()->json([
                'error' => 'Se requiere Token'
            ],401);
        }
        $array_token = explode(' ',$request->header('Authorization'));
        $token = $array_token[1];
        try {
            $credentials = JWT::decode($token, new Key(env('JWT_KEY'),'HS256'));
        } catch (ExpiredException $e) {
            return response()->json([
                'error' => 'El token ha expirado'
            ],400);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Algo ha ocurrido al decodear el token'
            ],400);
        }
        $user = User::where('email',$credentials->sub)->first();
        $request->auth = $user;
        return $next($request);
    }
}
