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
            $table->text('description');
            $table->text('description_conditionnement');
            $table->text('modele');
            $table->text('code_becpg');
            $table->text('code_erp');
            $table->text('ean');
            $table->text('ean_colis');
            $table->text('ean_palette');
            $table->integer('dossier_id');
            $table->integer('etat_produit_id');
            $table->integer('filiale_id');
            $table->integer('usine_id');
            $table->integer('geographique_id');
            $table->integer('marque_id');
            $table->integer('client_id');
            $table->integer('quantite_nette');
            $table->integer('unite_id');
            $table->text('poids_net_egoutte');
            $table->text('freinte_produit');
            $table->text('taille_portion');
            $table->text('unite_portion');
            $table->text('texte_portion');
            $table->integer('nombre_portion');
            $table->text('cahier_charge');
            $table->dateTime('date_limite_consommation');
            $table->dateTime('ddm_dua');
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
