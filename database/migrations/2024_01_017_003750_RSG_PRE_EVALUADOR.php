<?php

use App\Models\PreEvaluador;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RSG_PRE_EVALUADOR extends Migration{
    
    public function up(){
        Schema::create('RSG_PRE_EVALUADOR', function (Blueprint $table) {
            $table->id();
            $table->string('DNI')->default('00000000');
            $table->string('NombreSocia')->default('Sin Datos');
            $table->string('CodAsociacion');
            $table->string('DesAsociacion');
            $table->string('NombrePromotora');
            $table->double('Cuota',8,2)->default('0.00');
            $table->integer('Plazo')->default('0');
            $table->double('Monto',8,2)->default('0.00');
            $table->string('NivelRiesgo')->default('0');
            $table->double('SubNeto')->default('0.00');
            $table->double('IngresoNeto')->default('0.00');
            $table->double('DeudaExterna')->default('0.00');
            $table->double('CapacidadPago')->default('0.00');
            $table->string('CodRegion')->default('000');
            $table->string('Orden')->default('0');
            $table->dateTime('FechaRegistro')->default('2000-01-01');
            $table->dateTime('FechaVigencia')->default('2000-01-01');
            $table->foreignIdFor(PreEvaluador::class,'id_PreEvaluador_Padre')->constrained();
            $table->foreignIdFor(User::class,'id_Usuario_creacion')->constrained();
        });
    }

    public function down(){
        Schema::dropIfExists('RSG_PRE_EVALUADOR');
    }
}