<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';

    protected $fillable=[
        'id',
        'name',
        'sname',
        'username',
        'password',
        'email',
        'picture'
    ];
    public function admin()
    {
        return $this->hasMany(BookChapter::class, 'id', 'book_chap_id');
    }
}
