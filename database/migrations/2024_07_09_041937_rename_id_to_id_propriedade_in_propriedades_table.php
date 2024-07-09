<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIdToIdPropriedadeInPropriedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propriedades', function (Blueprint $table) {
            $table->renameColumn('id', 'idPropriedade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propriedades', function (Blueprint $table) {
            $table->renameColumn('idPropriedade', 'id');
        });
    }
}
