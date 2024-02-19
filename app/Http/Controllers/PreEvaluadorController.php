<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreEvaluador;
use App\Models\PreEvaluadorDet;

class PreEvaluadorController extends Controller{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function register(PreEvaluador $preEvaluador,PreEvaluadorDet $preEvaluadorDet){
        $this->validate($this->request,[
            'dni' => 'required|between:8,12',
            'nombrecompleto' => 'required',
            'bancocomunal' => 'required',
            'fecha' => 'required|date',
            'asesor' => 'required',
            'monto' => 'required|decimal:2',
            'plazo' => 'required|integer',
            'cuota' => 'required|decimal:2',
            'nivelriesgo' => 'required',
            'subneto'=> 'required|decimal:2',
            'deudaexterna'=> 'required|decimal:2',
            'ingresoneto' => 'required|decimal:2',
            'capacidadpago' => 'required|decimal:2',
            'CODREGION' => 'required',
            // 'fechamodificada' => 'required|date',
            // 'fechamodi_actual'=> 'required|date',
            // 'FECHAVIGENCIA' => 'required|date',

        ],[
            'required' => 'El campo :attribute es requerido',
            'FECHAVIGENCIA.required' => 'El campo Fecha Vigencia es requerido.',
            'CODREGION.required' => 'El campo Codigo Region es requerido.'
        ]);
        if($this->ValidaRegistroDia()){
            return response()->json(['error' => true, 'message' => 'Ya existe un Pre Evaluador del mismo dia'
                                    ],400);
        }
        

    }


    protected function ValidaRegistroDia(){
        $data = PreEvaluador::where('dni',$this->request->dni)->where('fecha',$this->request->fecha)->first();
        return $data;
    }

    protected function VigenciaPreEvaluador(){
        $data = PreEvaluador::where('dni',$this->request->dni)->where('fechavigencia','<>',$this->request->fecha)->first();
    }

}
