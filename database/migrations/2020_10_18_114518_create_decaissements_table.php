<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decaissements', function (Blueprint $table) {
            $table->id();
            $table->double('montant_decaisse');
            $table->date('date_decaissement');
            $table->bigInteger('bailleur_id')->index()->unsigned();
            $table->foreign('bailleur_id')->references('id')->on('bailleurs');
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
        Schema::dropIfExists('decaissements');
    }
}
