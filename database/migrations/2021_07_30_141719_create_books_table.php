<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('books', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('author_id');
      $table->string('title');
      $table->text('plot');
      $table->unsignedBigInteger('genre_id')->nullable();
      $table->integer('publication_year');
      $table->foreign('author_id')->references('id')->on('authors');
      $table->foreign('genre_id')->references('id')->on('genres')->onDelete('set null');
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
    Schema::dropIfExists('books');
  }
}
