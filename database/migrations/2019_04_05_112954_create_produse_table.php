<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produse', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nume_produs');
            $table->text('descriere_produs');
            $table->decimal('pret_produs', 7,2);
            $table->decimal('pret_vechi_produs', 7,2)->nullable();
            $table->integer('id_categorie_produs');
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
        Schema::dropIfExists('produse');
    }
}
