<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('category',['0','1'])->default('0');
            $table->float('precio', 8, 2);
            $table->integer('periodo');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            //LLaves
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
