<?php

use App\Models\PreEvaluador;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RSG_PRE_EVALUADOR_DET extends Migration{
    
    public function up(){
        Schema::create('RSG_PRE_EVALUADOR_DET', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PreEvaluador::class,'id_Pre_Evaluador')->constrained();
            $table->string('Act_Econ_1');
            $table->string('Act_Econ_2');
            $table->string('Act_Econ_3');
            $table->string('Act_Econ_4');
            $table->string('Act_Econ_5');
            $table->string('Act_Econ_5');
            $table->string('Marg_Util_1');
            $table->string('Marg_Util_2');
            $table->string('Marg_Util_3');
            $table->string('Marg_Util_4');
            $table->string('Marg_Util_5');
            $table->string('Frec_Econ_1');
            $table->string('Frec_Econ_2');
            $table->string('Frec_Econ_3');
            $table->string('Frec_Econ_4');
            $table->string('Frec_Econ_5');
            $table->string('Vent_Max_1');
            $table->string('Vent_Max_2');
            $table->string('Vent_Max_3');
            $table->string('Vent_Max_4');
            $table->string('Vent_Max_5');
            $table->string('Vent_Min_1');
            $table->string('Vent_Min_2');
            $table->string('Vent_Min_3');
            $table->string('Vent_Min_4');
            $table->string('Vent_Min_5');
            $table->string('Result_1');
            $table->string('Result_2');
            $table->string('Result_3');
            $table->string('Result_4');
            $table->string('Result_5');
        });
    }

    public function down(){
        Schema::dropIfExists('RSG_PRE_EVALUADOR_DET');
    }
}