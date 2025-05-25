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
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('tiempo_meses');
            $table->integer('cantidad_anuncios');
            $table->integer('precio_ar')->nullable();
            $table->integer('precio_bo')->nullable();
            $table->integer('precio_br')->nullable();
            $table->integer('precio_cl')->nullable();
            $table->integer('precio_co')->nullable();
            $table->integer('precio_ec')->nullable();
            $table->integer('precio_mx')->nullable();
            $table->integer('precio_pe')->nullable();
            $table->integer('precio_ve')->nullable();
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
        Schema::dropIfExists('planes');
    }
};
