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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->foreignId('plan_id')->nullable()->constrained('planes')->nullOnDelete();
            $table->rememberToken();
            $table->timestamps();
            $table->string('rol');
        });
        DB::table('users')->insert(
            array(
                'name' => 'Zero',
                'email' => 'judaslinarez@gmail.com',
                'password' => '$2y$10$6SLZ2GcdWKbuf6WRQhSgh.a3DckqJabDl4H5AMpHqsEUji8v1lPny',
                'rol' => 'admin'
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
        Schema::dropIfExists('users');
    }
};
