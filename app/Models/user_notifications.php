<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_id',
        'user_id',
        'status_id',
    ];
    public function notification(){
        return $this->belongsTo("App\Models\notification","notification_id");
    }            
    public function user(){
        return $this->belongsTo("App\Models\user","user_id");
    }            
    public function statuses(){
        return $this->belongsTo("App\Models\statuses","status_id");
    }                    
}
