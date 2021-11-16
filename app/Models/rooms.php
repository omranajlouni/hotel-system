<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'num',
        'person_num',
        'bath_num',
        'desc',
        'type',
        'floor_num',
        'availability',
        'price',

    ];
}
