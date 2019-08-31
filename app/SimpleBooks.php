<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SimpleBooks
 * @package App
 */
class SimpleBooks extends Model
{
    /**
     * @var string
     */
    protected $table = 'books';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'book_category_id',
        'book_author_id',
        'book_publisher_id',
        'name',
        'total_chapter',
        'total_page',
        'cover_page',
        'description',
        'status'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(BookCategory::class, 'id', 'book_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publisher()
    {
        return $this->hasMany(BookPublisher::class, 'id', 'book_publisher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function author()
    {
        return $this->hasMany(BookAuthor::class, 'id', 'book_author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapter()
    {
        return $this->hasMany(BookChapter::class, 'id', 'book_chap_id');
    }


}
