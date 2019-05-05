<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedInteger('book_category_id');
            $table->unsignedInteger('book_author_id');
            $table->unsignedInteger('book_publisher_id');
            $table->string('name');
            $table->integer('total_chapter');
            $table->integer('total_page');
            $table->string('cover_page');
            $table->string('description');
            $table->enum('status',['active','inactive'])->default('active');

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
