<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaireLigneActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaire_ligne_activites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('beneficiaire_id')->index()->unsigned();
            $table->foreign('beneficiaire_id')->references('id')->on('beneficiaires');
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
        Schema::dropIfExists('beneficiaire_ligne_activites');
    }
}
