<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoutsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Couts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->decimal('valeur');
            $table->string('unite');
            $table->decimal('valeur1');
            $table->decimal('valeur2');
            $table->decimal('euv');
            $table->boolean('manuel');
            $table->string('model_type');
            $table->integer('model_id');
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
        Schema::drop('Couts');
    }
}
