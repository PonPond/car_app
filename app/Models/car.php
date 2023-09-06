<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'version',
        'category',
        'number_car',
        'colors',
        'detail',
        'price',
        'img1',
        'img2',
        'img3',
    ];

}
