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
        Schema::create('opciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->boolean('valor')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_ar',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_br',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_bo',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_cl',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_co',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_ec',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_mx',
                'valor' => false,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_pe',
                'valor' => true,
            )
        );
        DB::table('opciones')->insert(
            array(
                'tipo' => 'catalogo_ve',
                'valor' => false,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
