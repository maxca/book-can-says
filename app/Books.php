<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected  $fillable = [
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
}
