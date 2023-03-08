<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sites_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('parent_id');
            $table->string('link');
            $table->softDeletes();
            $table->foreign('sites_id')->references('id')->on('sites')
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
        Schema::drop('dossiers');
    }
}
