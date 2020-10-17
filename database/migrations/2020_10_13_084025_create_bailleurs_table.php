<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBailleursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bailleurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_bailleur');
            $table->string('contact_bailleur');
            $table->string('adresse_bailleur');
            $table->string('mail_bailleur');
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
        Schema::dropIfExists('bailleurs');
    }
}
