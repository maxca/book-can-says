<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = [
        'id',
        'volunteer_id',
        'books_id',

    ];

    public function books()
    {
        return $this->hasOne(Books::class,'id','books_id');
    }

    public function admin()
    {
        return $this->hasOne(Volunteer::class,'id','volunteer_id');
    }
}
