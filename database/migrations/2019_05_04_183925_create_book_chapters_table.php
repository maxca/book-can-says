<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chap_name');
            $table->integer('chap_number');
            $table->string('status');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('admin_id');
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
        Schema::dropIfExists('book_chapters');
    }
}
