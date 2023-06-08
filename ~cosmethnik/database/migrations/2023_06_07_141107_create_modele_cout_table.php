<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleCoutTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_cout', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('cout_id')->unsigned();
            $table->decimal('valeur')->nullable();
            $table->string('unite');
            $table->decimal('valeur1')->nullable();
            $table->decimal('valeur2')->nullable();
            $table->decimal('euv')->nullable();
            $table->boolean('manuel')->nullable();
            $table->foreign('cout_id')->references('id')->on('couts');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modele_cout');
    }
}
