<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookAudio
 * @package App
 */
class BookAudio extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_audio';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'book_id',
        'book_chap_id',
        'chapter_name',
        'path',
        'total_page',
        'sub_book_chap',
        'amoung_listening',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapther()
    {
        return $this->hasMany(BookChapter::class, 'id', 'book_chap_id');
    }
}
