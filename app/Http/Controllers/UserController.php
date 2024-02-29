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

    /**
     * @OA\Get(
     *     path="/Users/ListUsers",
     *     tags={"Usuario"},
     *     summary="Lista de Usuarios",
     *     operationId="List_Users",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     ),
     * security={ {"bearerAuth":{}}}
     * )
     */
    public function ListUsers(){
        return response()->json( User::all()->where('active','Y'));
    }

    /**
     * @OA\Get(
     *     path="/Users/ListBancos",
     *     tags={"Usuario"},
     *     summary="Lista de Bancos Comunales",
     *     operationId="List_Bancos",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     ),
     * security={ {"bearerAuth":{}}}
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/Users/ListPromotor",
     *     tags={"Usuario"},
     *     summary="Lista de Promotores",
     *     operationId="List_Promotores",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     ),
     * security={ {"bearerAuth":{}}}
     * )
     */
    public function ListPromotor(){
        $Promotores = DB::select("SELECT * FROM SFD_OFICIALESCREDITO WHERE BAJA = 'N'");
        return response()->json( $Promotores );
    }

}
