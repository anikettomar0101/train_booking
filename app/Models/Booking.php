<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = ['coach_id', 'phone', 'seat_no', 'booking_id'];
}
