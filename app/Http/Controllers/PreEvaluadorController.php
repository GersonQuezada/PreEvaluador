<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreEvaluador;
use App\Models\PreEvaluadorDet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PreEvaluadorController extends Controller{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function register(PreEvaluador $preEvaluador,PreEvaluadorDet $preEvaluadorDet){
        $this->validate($this->request,[
            'DNI' => 'required|between:8,12',
            'NombreSocia' => 'required',
            'CodAsociacion' => 'required',
            'DesAsociacion' => 'required',            
            'NombrePromotora' => 'required',
            'Monto' => 'required|decimal:2',
            'Plazo' => 'required|integer',
            'Cuota' => 'required|decimal:2',
            'NivelRiesgo' => 'required',
            'SubNeto'=> 'required|decimal:2',
            'DeudaExterna'=> 'required|decimal:2',
            'IngresoNeto' => 'required|decimal:2',
            'CapacidadPago' => 'required|decimal:2',
            'CodRegion' => 'required',
            'FechaRegistro' => 'required|date',
            'Act_Econ_1' => 'required',
            'Act_Econ_2' => 'nullable',
            'Act_Econ_3' => 'nullable',
            'Act_Econ_4' => 'nullable',
            'Act_Econ_5' => 'nullable',
            'Marg_Util_1' => 'required|decimal:2',
            'Marg_Util_2' => 'nullable|decimal:2',
            'Marg_Util_3' => 'nullable|decimal:2',
            'Marg_Util_4' => 'nullable|decimal:2',
            'Marg_Util_5' => 'nullable|decimal:2',
            'Frec_Econ_1' => 'required',
            'Frec_Econ_2' => 'nullable',
            'Frec_Econ_3' => 'nullable',
            'Frec_Econ_4' => 'nullable',
            'Frec_Econ_5' => 'nullable',
            'Vent_Max_1' => 'required|decimal:2',
            'Vent_Max_2' => 'nullable|decimal:2',
            'Vent_Max_3' => 'nullable|decimal:2',
            'Vent_Max_4' => 'nullable|decimal:2',
            'Vent_Max_5' => 'nullable|decimal:2',
            'Vent_Min_1' => 'required|decimal:2',
            'Vent_Min_2' => 'nullable|decimal:2',
            'Vent_Min_3' => 'nullable|decimal:2',
            'Vent_Min_4' => 'nullable|decimal:2',
            'Vent_Min_5' => 'nullable|decimal:2',
            'Result_1' => 'required|decimal:2',
            'Result_2' => 'nullable|decimal:2',
            'Result_3' => 'nullable|decimal:2',
            'Result_4' => 'nullable|decimal:2',
            'Result_5' => 'nullable|decimal:2',  
        ],[
            'required' => 'El campo :attribute es requerido',
            'FECHAVIGENCIA.required' => 'El campo Fecha Vigencia es requerido.',
            'CODREGION.required' => 'El campo Codigo Region es requerido.',
            'decimal' => 'El campo :attribute debe tener 2 decimales.'
        ]);

        $datosPreEvaluador = [
            'DNI' => $this->request->DNI,
            'NombreSocia' => $this->request->NombreSocia,
            'CodAsociacion' => $this->request->CodAsociacion,
            'DesAsociacion' => $this->request->DesAsociacion,            
            'NombrePromotora' => $this->request->NombrePromotora,
            'Monto' => $this->request->Monto,
            'Plazo' => $this->request->Plazo,
            'Cuota' => $this->request->Cuota,
            'NivelRiesgo' => $this->request->NivelRiesgo,
            'SubNeto'=> $this->request->SubNeto,
            'DeudaExterna'=> $this->request->DeudaExterna,
            'IngresoNeto' => $this->request->IngresoNeto,
            'CapacidadPago' => $this->request->CapacidadPago,
            'CodRegion' => $this->request->CodRegion,
            'FechaRegistro' => $this->request->FechaRegistro
        ];

        $datosPreEvaluadorDet = [
            'Act_Econ_1' => $this->request->Act_Econ_1,
            'Act_Econ_2' => $this->request->Act_Econ_2,
            'Act_Econ_3' => $this->request->Act_Econ_3,
            'Act_Econ_4' => $this->request->Act_Econ_4,
            'Act_Econ_5' => $this->request->Act_Econ_5,
            'Marg_Util_1' => $this->request->Marg_Util_1,
            'Marg_Util_2' => $this->request->Marg_Util_2,
            'Marg_Util_3' => $this->request->Marg_Util_3,
            'Marg_Util_4' => $this->request->Marg_Util_4,
            'Marg_Util_5' => $this->request->Marg_Util_5,
            'Frec_Econ_1' => $this->request->Frec_Econ_1,
            'Frec_Econ_2' => $this->request->Frec_Econ_2,
            'Frec_Econ_3' => $this->request->Frec_Econ_3,
            'Frec_Econ_4' => $this->request->Frec_Econ_4,
            'Frec_Econ_5' => $this->request->Frec_Econ_5,
            'Vent_Max_1' => $this->request->Vent_Max_1,
            'Vent_Max_2' => $this->request->Vent_Max_2,
            'Vent_Max_3' => $this->request->Vent_Max_3,
            'Vent_Max_4' => $this->request->Vent_Max_4,
            'Vent_Max_5' => $this->request->Vent_Max_5,
            'Vent_Min_1' => $this->request->Vent_Min_1,
            'Vent_Min_2' => $this->request->Vent_Min_2,
            'Vent_Min_3' => $this->request->Vent_Min_3,
            'Vent_Min_4' => $this->request->Vent_Min_4,
            'Vent_Min_5' => $this->request->Vent_Min_5,
            'Result_1' => $this->request->Result_1,
            'Result_2' => $this->request->Result_2,
            'Result_3' => $this->request->Result_3,
            'Result_4' => $this->request->Result_4,
            'Result_5' => $this->request->Result_5,  
        ];

        if($this->ValidaRegistroDia()->count() > 0){
            return response()->json(['error' => true, 'message' => 'Ya existe un Pre Evaluador del mismo dia.'],400);
        }

        $dni = $this->request->DNI;     
        
        if( $this->VigenciaPreEvaluador()->count() == 0){
            $fechaVigencia = Carbon::today()->addYear(1)->format('d-m-Y');
            $Datos = array_merge($datosPreEvaluador, 
                    ['Orden' => '1' ,
                    'FechaVigencia' => $fechaVigencia ,
                    'Usuario_creacion' => $this->request->auth->email]
                    );
            $preEvaluador::create($Datos);
            $IdPreEvaluador = DB::getPdo()->lastInsertId();
            $preEvaluador::where('id','=',$IdPreEvaluador)->update(["id_PreEvaluador_Padre" => $IdPreEvaluador]);
            $DatosDet = array_merge(['id_Pre_Evaluador' => $IdPreEvaluador ],$datosPreEvaluadorDet);
            $preEvaluadorDet::create($DatosDet);
            return response()->json(['error' => false, 'message' => "Se registro el Pre Evaluador con DNI $dni con una vigencia hasta $fechaVigencia."],200);
        }elseif($this->VigenciaPreEvaluador()->count() < 3 ){
            $Orden = $this->VigenciaPreEvaluador()->count() + 1 ;
            $Datos = array_merge($datosPreEvaluador , 
                    ['Orden' => $Orden ,
                    'FechaVigencia' => $this->VigenciaPreEvaluador()[0]->FechaVigencia ,
                    'Usuario_creacion' => $this->request->auth->email]
                    );
            $preEvaluador::create($Datos);
            $IdPreEvaluador = DB::getPdo()->lastInsertId();
            $preEvaluador::where('id','=',$IdPreEvaluador)->update(["id_PreEvaluador_Padre" => $this->VigenciaPreEvaluador()[0]->id]);
            $DatosDet = array_merge(['id_Pre_Evaluador' => $IdPreEvaluador ],$datosPreEvaluadorDet);
            $preEvaluadorDet::create($DatosDet);
            return response()->json(['error' => false, 'message' => "Se registro el Pre Evaluador con DNI $dni , es el $Orden registrado."
                                    ],200);
        }else{
            return response()->json(['error' => true, 'message' => "No se puede registrar el Pre Evaluador con DNI $dni , este tiene Pre Evaluadores Vigentes."
                                    ],400);
        }


    }


    protected function ValidaRegistroDia(){
        $data = PreEvaluador::where('DNI',$this->request->DNI)->where('FechaRegistro',$this->request->FechaRegistro)->get();
        return $data;
    }

    protected function VigenciaPreEvaluador(){
        $data = PreEvaluador::where('DNI',$this->request->DNI)
        ->where('FechaVigencia','>',$this->request->FechaRegistro)
        ->orderBy('id','asc')
        ->get();
        return $data;
    }

}
