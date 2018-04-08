<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->text('body');
      $table->string('image')->nullable();
      $table->integer('user_id')->unsigned()->index();
      $table->integer('category_id')->unsigned()->index();
      $table->timestamps();

    });

    Schema::table('posts', function($table) {
       $table->foreign('user_id','category_id')->references('id','id')->on('users','categories')->onDelete('cascade','cascade');
   });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}
