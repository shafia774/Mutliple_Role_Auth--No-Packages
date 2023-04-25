<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ConstantStatus;


class Countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'countrycode',
        'status',
    ];

    protected $casts = [
        'status' => ConstantStatus::class,
    ];

}
