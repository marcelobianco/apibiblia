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
        Schema::create('versoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('abreviacao');
            $table->unsignedBigInteger('idioma_id');
            $table->timestamps();

            $table->foreign('idioma_id')->references('id')->on('idiomas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versoes');
    }
};
