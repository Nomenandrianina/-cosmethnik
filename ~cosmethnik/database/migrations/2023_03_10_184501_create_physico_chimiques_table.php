<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicoChimiquesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physico_chimiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('unite_id');
            $table->foreign('unite_id')->references('id')->on('unite');
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
        Schema::drop('physico_chimiques');
    }
}
