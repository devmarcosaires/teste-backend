<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculos', function (Blueprint $table) {
            $table->id('idVinculo');
            $table->unsignedBigInteger('idPropriedade');
            $table->unsignedBigInteger('idProdutor');
            $table->timestamps();

            $table->foreign('idPropriedade')->references('idPropriedade')->on('propriedades')->onDelete('cascade');
            $table->foreign('idProdutor')->references('idProdutor')->on('produtores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
    }
}
