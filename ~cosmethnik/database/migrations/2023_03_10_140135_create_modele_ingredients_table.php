<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleIngredientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('quantite');
            $table->boolean('ogm');
            $table->boolean('ionisation');
            $table->boolean('auxilliaire_technologie');
            $table->boolean('support');
            $table->integer('ingredient_id')->unsigned();
            $table->softDeletes();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')
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
        Schema::drop('modele_ingredients');
    }
}
