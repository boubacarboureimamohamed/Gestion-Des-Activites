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
            $table->string('piece_jointe')->nullable();
            $table->bigInteger('demandeur_id')->index()->unsigned();
            $table->foreign('demandeur_id')->references('id')->on('demandeurs');
            $table->bigInteger('responsable_activite_id')->index()->unsigned();
            $table->foreign('responsable_activite_id')->references('id')->on('responsable_activites');
            $table->bigInteger('budget_id')->index()->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets');
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
