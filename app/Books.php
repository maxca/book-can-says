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
    public function author()
    {
        return $this->hasOne(BookAuthor::class,'id','book_author_id');
    }

    public function category()
    {
        return $this->hasOne(BookCategory::class, 'id','book_category_id');
    }

    public function publisher()
    {
        return $this->hasOne(BookPublisher::class,'id','book_publisher_id');
    }
}
