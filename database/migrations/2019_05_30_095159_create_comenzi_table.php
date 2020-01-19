<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComenziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comenzi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume_comanda');
            $table->string('prenume_comanda');
            $table->text('adresa_comanda');
            $table->string('localitate_comanda');
            $table->string('judet_comanda');
            $table->string('telefon_comanda');
            $table->string('email_comanda');
            $table->string('stare_comanda')->default('nepreluata');
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
        Schema::dropIfExists('comanda');
    }
}
