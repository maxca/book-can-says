<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnChapterNameToBookAudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_audio', function (Blueprint $table) {
            $table->string('chapter_name')->after('book_chap_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_audio', function (Blueprint $table) {
            $table->dropColumn(['chapter_name']);
        });
    }
}
