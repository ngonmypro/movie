<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $casts = [
        'date_in'       => 'date',
        'date_out'      => 'date',
        'status'        => 'int'
    ];

    protected $hidden = [

    ];

    protected $fillable = [
        'name',
        'date_in',
        'date_out',
        'status'
    ];
}
