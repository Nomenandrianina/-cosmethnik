<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleAllergenesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_allergenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('quantite')->nullable();
            $table->boolean('pres_volontaire');
            $table->boolean('pres_fortuite');
            $table->string('arbre_decision');
            $table->string('source_pres_volontaire')->nullable();
            $table->string('source_pres_fortuite')->nullable();
            $table->integer('allergene_id')->unsigned();
            $table->softDeletes();
            $table->foreign('allergene_id')->references('id')->on('allergenes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modele_allergenes');
    }
}
