<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ConstantStatus;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'status',
    ];

    protected $casts = [
        'status' => ConstantStatus::class,
    ];
}
