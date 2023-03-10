<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleAllegationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modele_allegations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('allegation');
            $table->string('revendique');
            $table->string('information');
            $table->date('date_certification');
            $table->string('model_type');
            $table->integer('model_id');
            $table->integer('allegation_id');
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
        Schema::drop('modele_allegations');
    }
}
