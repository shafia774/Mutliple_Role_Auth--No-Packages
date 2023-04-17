<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Logics\Status;

class Countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'countrycode',
        'status',
    ];


}
