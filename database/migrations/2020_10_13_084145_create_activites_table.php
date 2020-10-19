<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_activite');
            $table->date('date_debut_activite');
            $table->date('date_fin_activite');
            $table->string('commentaire_activite');
            $table->string('piece_jointe');
            $table->bigInteger('demandeur_id')->index()->unsigned();
            $table->foreign('demandeur_id')->references('id')->on('demandeurs');
            $table->bigInteger('responsable_activite_id')->index()->unsigned();
            $table->foreign('responsable_activite_id')->references('id')->on('responsable_activites');
            $table->timestamps();
        });

        Schema::create('activites_ligne_activites', function (Blueprint $table) {
            $table->id();
            $table->double('montant_prevu');
            $table->string('nom_responsable');
            $table->string('mail_responsable')->unique();
            $table->string('contact_responsable');
            $table->bigInteger('activite_id')->index()->unsigned();
            $table->foreign('activite_id')->references('id')->on('activites');
            $table->bigInteger('ligne_activite_id')->index()->unsigned();
            $table->foreign('ligne_activite_id')->references('id')->on('ligne_activites');
            $table->timestamps();
        });

        Schema::create('activites_bailleurs', function (Blueprint $table) {
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
        Schema::dropIfExists('activites');
    }
}
