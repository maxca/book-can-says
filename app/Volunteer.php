<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table='volunteers';

    protected $fillable=[
        'facebook_id',
        'name',
        'email',
        'picture',
        'link',
        'create_date',
    ];

}
