<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitFiniTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_fini', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('libelle_commerciale')->nullable();
            $table->string('libelle_legale')->nullable();
            $table->string('description')->nullable();
            $table->string('modele')->nullable();
            $table->string('code_becpg')->nullable();
            $table->string('code_erp')->nullable();
            $table->string('ean')->nullable();
            $table->string('ean_colis')->nullable();
            $table->string('ean_palette')->nullable();
            $table->integer('quantite_nette')->nullable();
            $table->integer('poids_net_egoutte')->nullable();
            $table->decimal('freinte_produit')->nullable();
            $table->decimal('taille_portion')->nullable();
            $table->string('unite_portion')->nullable();
            $table->string('texte_portion')->nullable();
            $table->integer('nombre_portion')->nullable();
            $table->string('cdc')->nullable();
            $table->timestamp('date_limite_consommation')->nullable();
            $table->date('ddm_dua_day')->nullable();
            $table->integer('dossier_id')->unsigned()->nullable();
            $table->integer('etat_produit_id')->unsigned()->nullable();
            $table->integer('filiale_id')->unsigned()->nullable();
            $table->integer('usine_id')->unsigned()->nullable();
            $table->integer('geographique_id')->unsigned()->nullable();
            $table->integer('marque_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('unite_id')->unsigned()->nullable();
            $table->integer('monnaie_id')->unsigned()->nullable();
            $table->integer('precaution_emploie_id')->unsigned()->nullable();
            $table->integer('condition_conservation_id')->unsigned()->nullable();
            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('etat_produit_id')->references('id')->on('etat_produit');
            $table->foreign('filiale_id')->references('id')->on('filiales');
            $table->foreign('usine_id')->references('id')->on('usines');
            $table->foreign('geographique_id')->references('id')->on('geographique');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('unite_id')->references('id')->on('unites');
            $table->foreign('monnaie_id')->references('id')->on('monnaies');
            $table->foreign('precaution_emploie_id')->references('id')->on('precaution_emploi');
            $table->foreign('condition_conservation_id')->references('id')->on('condition_conservation');
            $table->softDeletes();
        });
    }

    /**x
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produit_fini');
    }
}
