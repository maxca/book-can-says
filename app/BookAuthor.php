<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Books;

class BookAuthor extends Model
{
    protected $table='book_authors';

    protected $fillable=[
        'id',
        'name',
    ];

    public function books()
    {
        return $this->belongsTo('id','books_id');
    }
}
