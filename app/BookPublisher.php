<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPublisher extends Model
{
    protected $table='book_publishers';

    protected  $fillable=[
        'id',
        'name',
    ];

    public function books()
    {
        return $this->belongsTo('id','books_id');
    }
}
