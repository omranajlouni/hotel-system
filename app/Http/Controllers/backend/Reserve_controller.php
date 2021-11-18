<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users_rooms;
use App\Models\user_notifications;

class Reserve_controller extends Controller
{
    public function form()
    {
        //here show the form

    }
    public function check()
    {
        //send the request to reseption

    }
    public function accept(Request $request)
    {
        //accept the request 
        $data=users_rooms::create([
            "user_id"=>$request->user_id,
            "room_id"=>$request->room_id,
            "status_id"=>$request->status_id,
            "duration"=>$request->duration,
        ]); 

    }
    public function accept_extend(Request $request)
    {
        //accept the request and send notification to user
        $data=users_rooms::create([
            "user_id"=>$request->user_id,
            "room_id"=>$request->room_id,
            "status_id"=>$request->status_id,
            "duration"=>$request->duration,
        ]); 

        $data2=user_notifications::create([
            "notification_id"=>$request->notification_id,
            "user_id"=>$request->user_id,
            "status_id"=>$request->status_id,
        ]); 

    }
}
