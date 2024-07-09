<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propriedades', function (Blueprint $table) {
            $table->id();
            $table->string('nomePropriedade');
            $table->string('numeroCar');
            $table->string('uf', 2);
            $table->string('municipio');
            $table->string('pais');
            $table->boolean('status');
            $table->boolean('liberado');
            $table->unsignedBigInteger('idProdutor');
            $table->timestamps();

            // Chave estrangeira para idProdutor na tabela produtores
            $table->foreign('idProdutor')->references('idProdutor')->on('produtores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propriedades');
    }
};
