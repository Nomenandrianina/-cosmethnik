<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleOrganoleptiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_organoleptiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caractéristique');
            $table->string('valeur');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('organoleptique_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modele_organoleptiques');
    }
}
