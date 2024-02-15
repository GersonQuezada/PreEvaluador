<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreEvaluador extends Model{

    // use HasFactory;
    protected $table = "RSG_PREEVALUADOR";

    protected $fillable = [
        'CODPREEVALUADOR',
        'nombrecompleto',
        'dni',
        'bancocomunal',
        'fecha',
        'asesor',
        'monto',
        'plazo',
        'cuota',
        'nivelriesgo',
        'subneto',
        'deudaexterna',
        'ingresoneto',
        'capacidadpago',
        'CODREGION',
        'fechamodificada',
        'fechamodi_actual',
        'FECHAVIGENCIA'
    ];

    // public $timestamps = false;
}
