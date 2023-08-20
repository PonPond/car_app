<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'detail',
        'number_car',
        'power_system',
        'battery',
        'electric_motor',
        'steering',
        'car_system',
        'anti_system',
        'price',
        'mm',
        'img1',
        'img2',
        'img3',
    ];

}
