<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('titre')->nullable();
            $table->string('libelle_legale')->nullable();
            $table->string('description')->nullable();
            $table->string('commentaires')->nullable();
            $table->integer('dossier_id')->unsigned()->nullable();
            $table->integer('etat_produit_id')->unsigned()->nullable();
            $table->integer('unite_id')->unsigned()->nullable();
            $table->string('code_bcpg')->nullable();
            $table->string('code_erp')->nullable();
            $table->string('ean')->nullable();
            $table->string('modele')->nullable();
            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('etat_produit_id')->references('id')->on('etat_produit');
            $table->foreign('unite_id')->references('id')->on('unites');
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
        Schema::drop('ressources');
    }
}
