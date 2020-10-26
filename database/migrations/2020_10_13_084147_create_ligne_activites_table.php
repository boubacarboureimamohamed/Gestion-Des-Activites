<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_activites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ligne_activite');
            $table->integer('quantite_ligne_activite')->nullable();
            $table->double('montant_ligne_activite');
            $table->string('commentaire')->nullable();
            $table->string('bailleur_ligne_activite')->nullable();
            $table->bigInteger('activite_id')->index()->unsigned();
            $table->foreign('activite_id')->references('id')->on('activites');
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
        Schema::dropIfExists('ligne_activites');
    }
}
