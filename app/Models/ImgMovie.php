<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgMovie extends Model
{
    protected $table = 'img_movies';

    protected $casts = [
        'id_movie'      => 'int',
        'main'          => 'int',
        'status'        => 'int'
    ];

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'id_movie',
        'name',
        'main',
        'status'
    ];

    public function id_movie()
    {
        return $this->belongsTo(\App\Models\Movie::class, 'id');
    }
}
