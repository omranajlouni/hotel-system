<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Helpers\APIHelpers;
use App\Models\UserNotification;
use App\Models\UserRoomService;

class Service_controller extends Controller
{
    public function create()
    {
         return "here create sevice";
    }


    public function add_service_request(Request $request)
    {
        $data = $request()->json()->all();
        $service=UserRoomService::create([
            "user_room_id"=>$data->user_room_id,
            "service_id"=>$data->service_id,
            "status_id"=>$data->status_id,
            "notes"=>$data->notes,
        ]);

        $response= APIHelpers::createAPIResponse(false,201,'service added',$service);
        return response()->json($response,200);
    }


    public function index($id)
    {
        $service= UserRoomService::find($id);

        if (is_null($service)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$service);
            return response()->json($response,404);
        }

        $response= APIHelpers::createAPIResponse(false,200,'here is service request',$service);
        return response()->json($response,200);
    }


    public function show()
    {
        $service = UserRoomService::all();
        $response= APIHelpers::createAPIResponse(false,200,'here is all services',$service);
        return response()->json($response,200);
    }


    public function show_user_service(Request $request)
    {
        $user_room_id=$request->user_room_id;
        $service = UserRoomService::all();
        foreach ($service as $ser) { 
            if(UserRoomService::where('user_room_id', $user_room_id))
                    $user_service =+$ser;
            }
        $response= APIHelpers::createAPIResponse(false,200,'here is all services',$user_service);
        return response()->json($response,200);
    }


    public function accept(Request $request)
    {
        $data = $request()->json()->all();
        $service= user_room_service::find($data->id);
        
        if (is_null($service)){
            $response= APIHelpers::createAPIResponse(true,404,'service not found',$data);
            return response()->json($response,404);
        }
        $data1=user_notifications::create([
            "notification_id"=>$data->notification_id,
            "user_id"=>$data->user_id,
            "status_id"=>$data->status_id,
        ]); 
        $response= APIHelpers::createAPIResponse(false,200,'service has been accepted',$data1);
        return response()->json($response,200);
    }


    public function decline(Request $request)
    {
        $data = $request()->json()->all();
        $data1=UserNotification::create([
            "notification_id"=>$data->notification_id,
            "user_id"=>$data->user_id,
            "status_id"=>$data->status_id,
        ]); 
        if (is_null($data1)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$data1);
            return response()->json($response,404);
        }
        $response= APIHelpers::createAPIResponse(false,200,'service has been declined',$data1);
        return response()->json($response,200);
    }

}
