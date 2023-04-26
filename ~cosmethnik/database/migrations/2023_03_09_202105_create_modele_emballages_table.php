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
            $table->integer('quantite')->nullable();
            $table->string('unite')->nullable();
            $table->integer('freinte')->nullable();
            $table->boolean('maitre')->nullable();
            $table->string('variantes')->nullable();
            $table->string('description')->nullable();
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
