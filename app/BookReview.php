<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookReview
 * @package App
 */
class BookReview extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_reviews';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'book_id',
        'score',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
