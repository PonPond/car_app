<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'cars_id',
        'start',
        'end',
        'all_price',
        'number_id_img',
        'car_id_img',
        'slip_id_img',
        'car_system',
        'anti_system',
        'date',
        'mm',
        'img1',
        'img2',
        'img3',
        'status'
    ];

    public function bookingtocars()
    {
        return $this->hasMany(Car::class, 'id', 'cars_id');
    }

    public function bookingtouser()
    {
        return $this->hasMany(UserProfile::class, 'id', 'users_id');
    }
}

