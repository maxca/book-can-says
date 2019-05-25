<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_audio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('book_chap_id');
            $table->string('path');
            $table->integer('total_page');
            $table->string('sub_book_chap');
            $table->integer('amoung_listening');
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
        Schema::dropIfExists('book_audio');
    }
}
