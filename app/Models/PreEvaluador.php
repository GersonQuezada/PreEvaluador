<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreEvaluador extends Model{

    // use HasFactory;
    protected $table = "RSG_PRE_EVALUADOR";

    protected $fillable = [
        'DNI',
        'NombreSocia',
        'CodAsociacion',
        'DesAsociacion',
        'NombrePromotora',
        'Cuota',
        'Plazo',
        'Monto',
        'NivelRiesgo',
        'SubNeto',
        'IngresoNeto',
        'DeudaExterna',
        'CapacidadPago',
        'CodRegion',
        'Orden',
        'FechaRegistro',
        'FechaVigencia',
        'Usuario_creacion'
    ];

    public $timestamps = false;
}
