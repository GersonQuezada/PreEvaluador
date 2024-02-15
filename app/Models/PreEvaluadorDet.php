<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreEvaluadorDet extends Model{
    protected $table = "RSG_PREEVALUADOR_DET";
    protected $fillable = [
        'dni','AE1', 'AE2', 'AE3', 'AE4', 'AE5','MU1', 'MU2', 'MU3', 'MU4', 'MU5','FE1', 'FE2', 'FE3', 'FE4', 'FE5','VMAX1', 'VMAX2', 'VMAX3', 'VMAX4','VMAX5',
        'VMIN1', 'VMIN2', 'VMIN3', 'VMIN4','VMIN5','RESULT1', 'RESULT2', 'RESULT3', 'RESULT4','RESULT5','fechaRegis'
    ];

    // public $timestamps = false;
}
