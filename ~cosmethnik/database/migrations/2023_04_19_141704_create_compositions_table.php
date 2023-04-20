<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compositions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('matiere_premier_id')->unsigned()->nullable();
            $table->string('unite')->nullable();
            $table->integer('quantite')->nullable();
            $table->string('poids')->nullable();
            $table->double('rendement')->nullable();
            $table->double('freinte')->nullable();
            $table->string('model_type')->nullable();
            $table->integer('model_id')->nullable();
            $table->softDeletes();
            $table->foreign('matiere_premier_id')->references('id')->on('matiere_premiere')
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
        Schema::drop('compositions');
    }
}
