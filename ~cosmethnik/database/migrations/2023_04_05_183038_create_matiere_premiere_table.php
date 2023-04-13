<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatierePremiereTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_premiere', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nom');
            $table->text('libelle_commerciale');
            $table->text('libelle_legale');
            $table->text('description')->nullable();
            $table->text('description_conditionnement')->nullable();
            $table->text('modele')->nullable();
            $table->text('code_becpg')->nullable();
            $table->text('code_erp')->nullable();
            $table->text('ean')->nullable();
            $table->text('ean_colis')->nullable();
            $table->text('ean_palette')->nullable();
            $table->integer('dossier_id')->unsigned()->nullable();;
            $table->integer('etat_produit_id')->unsigned()->nullable();;
            $table->integer('filiale_id')->unsigned()->nullable();;
            $table->integer('usine_id')->unsigned()->nullable();;
            $table->integer('geographique_id')->unsigned()->nullable();;
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('client_id')->unsigned()->nullable();;
            $table->integer('quantite_nette')->nullable();
            $table->integer('unite_id')->unsigned()->nullable();;
            $table->text('poids_net_egoutte')->nullable();
            $table->text('freinte_produit')->nullable();
            $table->text('taille_portion')->nullable();
            $table->text('unite_portion')->nullable();
            $table->text('texte_portion')->nullable();
            $table->integer('nombre_portion')->nullable();
            $table->text('cahier_charge')->nullable();
            $table->dateTime('date_limite_consommation')->nullable();
            $table->dateTime('ddm_dua')->nullable();
            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('etat_produit_id')->references('id')->on('etat_produit');
            $table->foreign('filiale_id')->references('id')->on('filiales');
            $table->foreign('usine_id')->references('id')->on('usines');
            $table->foreign('geographique_id')->references('id')->on('geographique');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::drop('matiere_premiere');
    }
}
