<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class h_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_num',
        'email',
        'password',
    ];

}
