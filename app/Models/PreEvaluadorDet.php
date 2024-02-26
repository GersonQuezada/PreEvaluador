<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreEvaluadorDet extends Model{
    protected $table = "RSG_PRE_EVALUADOR_DET";
    protected $fillable = [
            'id_Pre_Evaluador',
            'Act_Econ_1' ,
            'Act_Econ_2' ,
            'Act_Econ_3' ,
            'Act_Econ_4' ,
            'Act_Econ_5' ,
            'Marg_Util_1',
            'Marg_Util_2',
            'Marg_Util_3',
            'Marg_Util_4',
            'Marg_Util_5',
            'Frec_Econ_1',
            'Frec_Econ_2',
            'Frec_Econ_3',
            'Frec_Econ_4',
            'Frec_Econ_5',
            'Vent_Max_1',
            'Vent_Max_2',
            'Vent_Max_3',
            'Vent_Max_4',
            'Vent_Max_5',
            'Vent_Min_1',
            'Vent_Min_2',
            'Vent_Min_3',
            'Vent_Min_4',
            'Vent_Min_5',
            'Result_1',
            'Result_2',
            'Result_3',
            'Result_4',
            'Result_5',
    ];

    public $timestamps = false;
}
