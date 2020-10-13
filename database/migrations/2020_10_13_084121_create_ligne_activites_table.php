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
            $table->string('nom_responsable_ligne');
            $table->string('mail_responsable_ligne');
            $table->string('contact_responsable_ligne');
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
