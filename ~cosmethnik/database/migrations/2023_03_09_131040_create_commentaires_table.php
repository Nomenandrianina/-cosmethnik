<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('users_id')->unsigned();
            $table->unsignedBigInteger('users_id');
            $table->string('description');
            $table->string('model_type');
            $table->integer('model_id');
            $table->softDeletes();
            $table->foreign('users_id')->references('id')->on('users')
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('commentaires');
    }
}
