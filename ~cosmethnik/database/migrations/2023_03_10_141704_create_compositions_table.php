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
            $table->integer('quantite');
            $table->string('unite');
            $table->string('poids');
            $table->double('rendement');
            $table->double('freinte');
            $table->string('model_type');
            $table->integer('model_id');
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
        Schema::drop('compositions');
    }
}
