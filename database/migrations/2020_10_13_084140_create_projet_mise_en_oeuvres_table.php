<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetMiseEnOeuvresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_mise_en_oeuvres', function (Blueprint $table) {
            $table->id();
            $table->string('nom_projet');
            $table->string('nom_responsable_projet');
            $table->string('email_responsable_projet');
            $table->string('contact_responsable_projet');
            $table->bigInteger('plan_action_id')->index()->unsigned();
            $table->foreign('plan_action_id')->references('id')->on('plan_actions');
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
        Schema::dropIfExists('projet_mise_en_oeuvres');
    }
}
