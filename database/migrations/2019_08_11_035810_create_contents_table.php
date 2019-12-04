<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('slug')->unique();
            $table->string('title');
            $table->string('type');
            $table->string('kid');
            $table->longText('tkid');
            $table->integer('s');
            $table->string('cover');
            $table->string('pics');
            $table->string('uid')->references('id')->on('users');            
            $table->longText('html');
            $table->json('json');
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
        Schema::dropIfExists('contents');
    }
}
