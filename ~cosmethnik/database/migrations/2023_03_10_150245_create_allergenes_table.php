<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->string('libelle_legale')->nullable();
            $table->string('type');
            $table->string('code_allergene');
            $table->string('seuil_reglementaire')->nullable();
            $table->integer('allergene_enfant');
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
        Schema::drop('allergenes');
    }
}
