<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComenziProduseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comenzi_produse', function (Blueprint $table) {
            $table->integer('id_comanda');
            $table->integer('id_produs');
            $table->string('marime');
            $table->integer('cantitate');
            $table->decimal('pret',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comenzi_produse');
    }
}
