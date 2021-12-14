<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'desc',
        'price',
    ];
    public function users_rooms_food(){
        return $this->hasMany("App\Models\users_rooms_food","food_id");
    }            
}
