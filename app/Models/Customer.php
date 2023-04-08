<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'pincode',
        'address',
        'image',
        'wallet',
        'status',
        'f_uid',
    ];
}
