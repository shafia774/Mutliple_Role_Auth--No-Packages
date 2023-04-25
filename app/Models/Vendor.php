<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ConstantStatus;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'wallet',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,  'user_id');
    }

    protected $casts = [
        'status' => ConstantStatus::class,
    ];
}
