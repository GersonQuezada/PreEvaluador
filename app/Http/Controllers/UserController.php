<?php
namespace App\Http\Controllers;

use App\Models\AsociacionComunal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function ListUsers(){
        return response()->json( User::all()->where('active','Y'));
    }

    public function ListBancos(){
        $user = $this->request->auth;
        $Regiones = DB::table('sec_users_sucursal')->where('login',$user->login)->get();
        //Convertimos la sentencia en un array remplazando el valor
        $valores = $Regiones->map(function ($region) {
            return (string) $region->CODREGION;  // Reemplaza 'CODREGION' con el campo que necesitas
        })->toArray();
        $placeholders = implode(',', array_fill(0, count($valores), '?'));
        $query = "SELECT * FROM SFD_ASOCIACIONCOMUNAL WHERE BANCOBAJA = 'N' and  CODSUCURSAL_ASOC COLLATE SQL_Latin1_General_CP1_CI_As IN ( $placeholders )";
        $resultado = DB::select($query, (array)$valores);
        return response()->json($resultado);
    }

}
