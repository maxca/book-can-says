<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'user_id',
        'book_chap_id',
        'chapter_name',
        'path',
        'total_page',
        'sub_book_chap',
        'amoung_listening',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function chapther()
    {
        return $this->hasMany(BookChapter::class, 'id', 'book_chap_id');
    }

    public function reader()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
