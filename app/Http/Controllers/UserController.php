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
        $Regiones = DB::table('sec_users_sucursal')->select('CODREGION')->where('login',$user->login);

        $valores = ['002', '004', '003'];
        $placeholders = implode(',', array_fill(0, count($Regiones), '?'));

        $query = "SELECT * FROM SFD_ASOCIACIONCOMUNAL WHERE CODSUCURSAL_ASOC COLLATE SQL_Latin1_General_CP1_CI_As IN ($placeholders)";

        $resultado = DB::select($query, $valores);
        // $bancos = DB::select('select * from SFD_ASOCIACIONCOMUNAL where BANCOBAJO = "N" ');
        // $bancos = DB::select("SELECT * FROM SFD_ASOCIACIONCOMUNAL WHERE BANCOBAJA = N and  CODSUCURSAL_ASOC SQL_Latin1_General_CP1_CI_As in ( '?' ) ", ['002','004']);
        // $bancos =  AsociacionComunal::where('BANCOBAJA', 'N')->whereIn('CODSUCURSAL_ASOC ', $Regiones)->get()->collate('SQL_Latin1_General_CP1_CI_As');

        dd($resultado);


        // dd($arrayName);
        // return response()->json(
        //     AsociacionComunal::all()
        //     ->where('BANCOBAJA', 'N')
        //     ->whereIn('CODREGION', $Regiones)
        //     ->get()
        // );
    }

}
