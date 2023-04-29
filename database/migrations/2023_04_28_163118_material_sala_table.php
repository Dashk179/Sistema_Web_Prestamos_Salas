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
        Schema::create('material_salas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materiales_id')->nullable()->constrained('materiales')->onDelete('set null')->onUpdate('cascade');;
            $table->foreignId('salas_id')->nullable()->constrained('salas')->onDelete('cascade')->onUpdate('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_sala');
    }
};
