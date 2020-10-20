<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteBailleursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_bailleurs', function (Blueprint $table) {
            $table->id();
            $table->double('montant_annonce');
            $table->bigInteger('activite_id')->index()->unsigned();
            $table->foreign('activite_id')->references('id')->on('activites');
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
        Schema::dropIfExists('activite_bailleurs');
    }
}
