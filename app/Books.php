<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'id',
        'user_id',
        'book_category_id',
        'book_author_id',
        'book_publisher_id',
        'name',
        'total_chapter',
        'total_page',
        'cover_page',
        'pdf',
        'description',
        'status',
        'publish_status',

    ];

    public function favorite()
    {
        return $this->belongsTo(Favai, 'favorite_id');
    }


    public function category()
    {
        return $this->hasOne(BookCategory::class, 'id', 'book_category_id');
    }

    public function publisher()
    {
        return $this->hasMany(BookPublisher::class, 'id', 'book_publisher_id');
    }

    public function authors()
    {
        return $this->hasMany(BookAuthor::class, 'id', 'book_author_id');
    }

    public function chapter()
    {
        return $this->hasMany(BookChapter::class, 'id', 'book_chap_id');
    }

    public function review()
    {
        return $this->hasMany(BookReview::class, 'book_id', 'id');
    }

    public function audio()
    {
        return $this->hasMany(BookAudio::class, 'book_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }



}
