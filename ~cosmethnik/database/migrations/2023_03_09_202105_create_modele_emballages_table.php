<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleEmballagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_emballages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('emballage_id')->unsigned();
            $table->integer('quantite');
            $table->string('unite');
            $table->integer('freinte');
            $table->boolean('maitre');
            $table->increments('variantes');
            $table->string('description');
            $table->softDeletes();
            $table->foreign('emballage_id')->references('id')->on('emballages')
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
        Schema::drop('modele_emballages');
    }
}
