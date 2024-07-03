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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->integer('posicao');
            $table->string('nome');
            $table->string('abreviacao');
            $table->unsignedBigInteger('testamento_id');
            $table->unsignedBigInteger('versao_id')->nullable();
            $table->timestamps();


            $table->foreign('testamento_id')->references('id')->on('testamentos');
            $table->foreign('versao_id')->references('id')->on('versoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
};
