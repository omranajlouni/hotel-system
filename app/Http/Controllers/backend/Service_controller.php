<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Helpers\APIHelpers;
use App\Models\user_notifications;

class Service_controller extends Controller
{
    public function create()
    {
         return "here create sevice";
    }

    public function store(Request $request)
    {

        $service=service::create([
            "user_room_id"=>$request->user_room_id,
            "service_id"=>$request->service_id,
            "status_id"=>$request->status_id,
            "notes"=>$request->notes,
        ]);

        $response= APIHelpers::createAPIResponse(false,201,'service added',$service);
        return response()->json($response,200);
    }

    public function index($id)
    {
        $service= service::find($id);

        if (is_null($service)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$service);
            return response()->json($response,404);
        }

        $response= APIHelpers::createAPIResponse(false,200,'',$service);
        return response()->json($response,200);
    }

    public function show()
    {
        $service = service::all();
        $response= APIHelpers::createAPIResponse(false,200,'here is all services',$service);
        return response()->json($response,200);
    }

    public function show_user_service(Request $request)
    {
        $user_room_id=$request->user_room_id;
        $service = service::all();
        foreach ($service as $ser) { 
            if(service::where('user_room_id', $user_room_id))
                    $user_service =+$ser;
            }
        $response= APIHelpers::createAPIResponse(false,200,'here is all services',$user_service);
        return response()->json($response,200);
    }

    public function accept(Request $request)
    {
        $data=user_notifications::create([
            "notification_id"=>$request->notification_id,
            "user_id"=>$request->user_id,
            "status_id"=>$request->status_id,
        ]); 
        if (is_null($data)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$data);
            return response()->json($response,404);
        }
        $response= APIHelpers::createAPIResponse(false,200,'service has been accepted',$data);
        return response()->json($response,200);
    }
    public function decline(Request $request)
    {
        $data=user_notifications::create([
            "notification_id"=>$request->notification_id,
            "user_id"=>$request->user_id,
            "status_id"=>$request->status_id,
        ]); 
        if (is_null($data)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$data);
            return response()->json($response,404);
        }
        $response= APIHelpers::createAPIResponse(false,200,'service has been declined',$data);
        return response()->json($response,200);
    }

}
