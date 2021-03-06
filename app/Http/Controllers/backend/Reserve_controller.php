<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRoom;
use App\Models\UserNotification;
use App\Helpers\APIHelpers;

class Reserve_controller extends Controller
{

    public function form()
    {
        //here show the form

    }

    
     
    public function show()
    {
        $reservs = UserRoom::all();
        $response= APIHelpers::createAPIResponse(false,200,'here is all the reservations',$reservs);
        return response()->json($response,200);
    }



    public function store(Request $request)
    {
        $data = $request()->json()->all();
        $data1=UserRoom::create([
            "user_id"=>$data->user_id,
            "room_id"=>$data->room_id,
            "status_id"=>$data->status_id,
            "duration"=>$data->duration,
        ]);

        $response= APIHelpers::createAPIResponse(false,201,'the reserve added',$data1);
        return response()->json($response,201);

    }
    


    public function accept(Request $request)
    {
        //accept the request 
        $data = $request()->json()->all();
        $data1=UserRoom::create([
            "user_id"=>$data->user_id,
            "room_id"=>$data->room_id,
            "status_id"=>$data->status_id,
            "duration"=>$data->duration,
        ]); 
        $response= APIHelpers::createAPIResponse(false,201,'',$data1);
        return response()->json($response,201);

    }



    public function accept_extend(Request $request)
    {
        //accept the request and send Notification to user
        $data = $request()->json()->all();
        $data1=UserRoom::create([
            "user_id"=>$data->user_id,
            "room_id"=>$data->room_id,
            "status_id"=>$data->status_id,
            "duration"=>$data->duration,
        ]); 

        $data2=UserNotification::create([
            "notification_id"=>$data->notification_id,
            "user_id"=>$data->user_id,
            "status_id"=>$data->status_id,
        ]); 

        $response= APIHelpers::createAPIResponse(false,201,'',$data1+$data2);
        return response()->json($response,200);

    }
}
