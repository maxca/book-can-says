<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    protected $table = 'book_chapters';

    protected $fillable = [
        'id',
        'chap_name',
        'chap_number',
        'status',
        'book_id',
        'admin_id',
    ];


    public function audio()
    {
        return $this->belongsTo('id','book_audio_id');
    }

    public function books()
    {
        return $this->belongsTo('id','books_id');
    }

    public function admin()
    {
        return $this->belongsTo('id','admin_id');
    }



}
