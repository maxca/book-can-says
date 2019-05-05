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
}
