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
            $table->string('libelle_commerciale');
            $table->string('libelle_legale');
            $table->string('description');
            $table->string('modele');
            $table->string('code_bcpg');
            $table->string('code_erp');
            $table->string('ean');
            $table->string('ean_colis');
            $table->string('ean_palette');
            $table->integer('quantite_nette');
            $table->integer('poids_net_egoutte');
            $table->decimal('freinte_produit');
            $table->decimal('taille_portion');
            $table->string('unite_portion');
            $table->string('texte_portion');
            $table->integer('nombre_portion');
            $table->string('cdc');
            $table->timestamp('date_limite_consommation');
            $table->timestamp('ddm_dua');
            $table->integer('dossier_id')->unsigned();
            $table->integer('etat_produit_id')->unsigned();
            $table->integer('filiale_id')->unsigned();
            $table->integer('usine_id')->unsigned();
            $table->integer('geographique_id')->unsigned();
            $table->integer('marque_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('unite_id')->unsigned();
            $table->integer('monnaie_id')->unsigned();
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
        Schema::drop('produit_fini');
    }
}
