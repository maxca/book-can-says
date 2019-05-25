<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategoty extends Model
{
    protected $table = 'book_categories';
    protected $fillable  =[
        'id', 'name'
    ];
}
