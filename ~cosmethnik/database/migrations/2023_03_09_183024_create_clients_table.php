<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('titre');
            $table->string('etat_client');
            $table->string('code_bcpg');
            $table->string('code_erp');
            $table->string('telephone');
            $table->string('mail');
            $table->string('fax');
            $table->string('adress1');
            $table->string('adress2');
            $table->string('adress3');
            $table->string('ville');
            $table->string('code_postal');
            $table->integer('pays_id')->unsigned();
            $table->softDeletes();
            $table->foreign('pays_id')->references('id')->on('pays')
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
        Schema::drop('clients');
    }
}
