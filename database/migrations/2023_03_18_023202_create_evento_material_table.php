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
        Schema::create('evento_materiales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('eventos_id')->nullable()->constrained('eventos')->onDelete('set null')->onUpdate('cascade');;
            $table->foreignId('materiales_id')->nullable()->constrained('materiales')->onDelete('cascade')->onUpdate('cascade');;
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
        Schema::dropIfExists('evento_material');
    }
};
