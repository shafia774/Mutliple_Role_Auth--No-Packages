<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ConstantStatus;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class,  'country_id');
    }

    protected $casts = [
        'status' => ConstantStatus::class,
    ];
}
