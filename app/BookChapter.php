<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    protected $table = 'book_chapters';

    protected $fillable = [
        'id',
        'chap_name',
        'chap_number',
        'status',
        'book_id',
        'admin_id',
    ];

    public function books()
    {
        return $this->hasOne(Books::class, 'id', 'book_id');

    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
