<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelePhysicoChimiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Modele_physico_chimiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caracteristique');
            $table->string('valeur');
            $table->integer('mini');
            $table->integer('maxi');
            $table->string('critere_texte');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('physico_chimique_id');
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
        Schema::drop('Modele_physico_chimiques');
    }
}
