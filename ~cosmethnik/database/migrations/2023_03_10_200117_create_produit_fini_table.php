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
            $table->integer('dossier_id');
            $table->integer('etat_produit_id');
            $table->integer('filiale_id');
            $table->integer('usine_id');
            $table->integer('geographique_id');
            $table->integer('marque_id');
            $table->integer('client_id');
            $table->integer('unite_id');
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
