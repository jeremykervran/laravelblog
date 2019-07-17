<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    protected $fillable = [
        'title',
        'band',
        'year',
        'genre',
        'state',
        'cover'       
    ];
}
