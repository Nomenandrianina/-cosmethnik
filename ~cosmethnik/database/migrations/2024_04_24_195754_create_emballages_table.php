<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmballagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emballages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->integer('dossier_id')->unsigned();
            $table->integer('unite')->unsigned()->nullable();
            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('unite')->references('id')->on('unites');
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
        Schema::drop('emballages');
    }
}
