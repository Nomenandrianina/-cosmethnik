<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleMateriauxTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_materiaux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modele_type');
            $table->integer('modele_id');
            $table->integer('poids');
            $table->integer('materiaux_id');
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
        Schema::drop('modele_materiaux');
    }
}
