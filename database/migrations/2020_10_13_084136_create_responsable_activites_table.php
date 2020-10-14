<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_activites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_responsable_activite');
            $table->string('prenom_responsable_activite');
            $table->string('mail_responsable_activite');
            $table->string('contact_responsable_activite');
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
        Schema::dropIfExists('responsable_activites');
    }
}
