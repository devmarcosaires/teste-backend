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
        Schema::create('produtores', function (Blueprint $table) {
            $table->id('idProdutor');
            $table->string('registroIndividual')->unique();
            $table->string('nomeProdutor');
            $table->boolean('status')->default(1); // 1 para ativo, 0 para inativo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtores');
    }
};
