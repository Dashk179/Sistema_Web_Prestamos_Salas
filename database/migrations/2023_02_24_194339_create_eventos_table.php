<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table-> foreignId('salas_id')->constrained('salas');
            $table-> foreignId('user_id')->constrained('users');
            $table->dateTime("fecha_entrada");
            $table->dateTime("fecha_salida");
            $table->dateTime("fecha_salida");
            $table->string('email_solicitante');
            $table->unique(['salas_id','fecha_entrada']);//Restriction para que no existan registros con fecha_entrada y fecha_salida iguales con un mismo ID.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
