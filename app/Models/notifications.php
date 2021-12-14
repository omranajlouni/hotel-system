<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'img',
     ];
    public function user_notifications(){
        return $this->hasMany("App\Models\user_notifications","notification_id");
    }
}
