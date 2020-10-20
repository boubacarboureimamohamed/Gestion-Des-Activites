<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiviteLigneActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_ligne_activites', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activite_ligne_activites');
    }
}
