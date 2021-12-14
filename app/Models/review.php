<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desc',
    ];
    public function user(){
        return $this->belongsTo("App\Models\user","user_id");
    }       
}