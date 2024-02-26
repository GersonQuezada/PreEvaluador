<?php

use App\Models\PreEvaluador;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    
    public function up(){
        Schema::create('RSG_PRE_EVALUADOR_DET', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Pre_Evaluador')->constrained('RSG_PRE_EVALUADOR','id');
            $table->string('Act_Econ_1');
            $table->string('Act_Econ_2')->nullable();
            $table->string('Act_Econ_3')->nullable();
            $table->string('Act_Econ_4')->nullable();
            $table->string('Act_Econ_5')->nullable();
            $table->decimal('Marg_Util_1',8,2);
            $table->decimal('Marg_Util_2',8,2)->nullable();
            $table->decimal('Marg_Util_3',8,2)->nullable();
            $table->decimal('Marg_Util_4',8,2)->nullable();
            $table->decimal('Marg_Util_5',8,2)->nullable();
            $table->string('Frec_Econ_1');
            $table->string('Frec_Econ_2')->nullable();
            $table->string('Frec_Econ_3')->nullable();
            $table->string('Frec_Econ_4')->nullable();
            $table->string('Frec_Econ_5')->nullable();
            $table->decimal('Vent_Max_1',8,2);
            $table->decimal('Vent_Max_2',8,2)->nullable();
            $table->decimal('Vent_Max_3',8,2)->nullable();
            $table->decimal('Vent_Max_4',8,2)->nullable();
            $table->decimal('Vent_Max_5',8,2)->nullable();
            $table->decimal('Vent_Min_1',8,2);
            $table->decimal('Vent_Min_2',8,2)->nullable();
            $table->decimal('Vent_Min_3',8,2)->nullable();
            $table->decimal('Vent_Min_4',8,2)->nullable();
            $table->decimal('Vent_Min_5',8,2)->nullable();
            $table->decimal('Result_1',8,2);
            $table->decimal('Result_2',8,2)->nullable();
            $table->decimal('Result_3',8,2)->nullable();
            $table->decimal('Result_4',8,2)->nullable();
            $table->decimal('Result_5',8,2)->nullable();            
        });
    }

    public function down(){
        Schema::dropIfExists('RSG_PRE_EVALUADOR_DET');
    }
};