<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleNutrimentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_nutriment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nutriment_id')->unsigned()->nullable();
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('valeur');
            $table->string('unite')->nullable();
            $table->integer('mini')->nullable();
            $table->integer('maxi')->nullable();
            $table->integer('portion')->nullable();
            $table->string('unite_portion')->nullable();
            $table->integer('ajr_portion')->nullable();
            $table->integer('perte')->nullable();
            $table->string('methode')->nullable();
            $table->foreign('nutriment_id')->references('id')->on('nutriments');
            $table->softDeletes();
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
        Schema::drop('modele_nutriment');
    }
}
