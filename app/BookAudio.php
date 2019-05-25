<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAudio extends Model
{
    protected $table = 'book_audio';
    protected $fillable = [
        'id',
        'book_chap_id',
        'path',
        'total_page',
        'sub_book_chap',
        'amoung_listening'
    ];
    public function chapther()
    {
        return $this->hasOne(BookChapter::class,'id','book_chap_id');
    }
}
