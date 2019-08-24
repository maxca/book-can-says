<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_categories';

    //สำหรับตั้งค่าว่ามีคอลลัมอะไรในตาราง
    protected $fillable  =[
        'id', 'name'
    ];





}
