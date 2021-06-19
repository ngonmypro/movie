<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $casts = [
        'id_movie'      => 'int',
        'id_user'       => 'int',
        'point'         => 'int'
    ];

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'id_movie',
        'id_user',
        'point',
        'comment'
    ];

    public function id_movie()
    {
        return $this->belongsTo(\App\Models\Movie::class, 'id');
    }

    public function id_user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id');
    }
}
