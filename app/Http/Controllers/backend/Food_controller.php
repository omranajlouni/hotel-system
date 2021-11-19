<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Helpers\APIHelpers;
use Illuminate\Http\Request;
use App\Models\food;
use App\Models\users_rooms_food;
use App\Models\user_notifications;

class Food_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $foods = food::all();
        $response= APIHelpers::createAPIResponse(false,200,'',$foods);
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "here create food";
    }

    public function order_food(Request $request)
    {
        $data = $request()->json()->all();
        $food=users_rooms_food::create([
            "user_room_id"=>$data->user_room_id,
            "food_id"=>$data->food_id,
            "count"=>$data->count,
            "notes"=>$data->notes,
            
        ]);
        $response= APIHelpers::createAPIResponse(false,201,'food added',$food);
        return response()->json($response,201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request()->json()->all();

        if($data->hasFile('img')){
            $file=$data->img;
            $new_file = time().$file-> getClientOriginalName();
            $file->move('/storage/food_img/'. $new_file);
        }

        $foods=food::create([
            "title"=>$data->title,
            "img"=>'/storage/food_img'. $new_file,
            "desc"=>$data->desc,
            "price"=>$data->price,
        ]);
        $response= APIHelpers::createAPIResponse(false,201,'',$foods);
        return response()->json($response,201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $foods = food::find($id);
        $response= APIHelpers::createAPIResponse(false,200,'',$foods);
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foods = food::find($id);
        $response= APIHelpers::createAPIResponse(false,200,'',$foods);
        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request()->json()->all();
        if($data->hasFile('img')){
            $file=$data->img;
            $new_file = time().$file-> getClientOriginalName();
            $file->move('/storage/food_img/'. $new_file);
        }

        $foods= food::find($id);
        $foods-> title= $data->title;
        $foods-> desc= $data->desc;
        $foods-> img= '/storage/food_img'. $new_file;
        $foods-> price= $data->price;
        $foods->update();

        if (is_null($foods)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$foods);
            return response()->json($response,404);
        }
        
        $response= APIHelpers::createAPIResponse(false,200,'',$foods);
        return response()->json($response,200);
    }

   
    public function destroy($id)
    {
        $foods= food::find($id);
        $foods->destroy($id);
        if (is_null($foods)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$foods);
            return response()->json($response,404);
        }
        $response= APIHelpers::createAPIResponse(false,200,'delete success',$foods);
        return response()->json($response,200);
    }
    public function show_food_order()
    {
        $orders = users_rooms_food::all();

        $response= APIHelpers::createAPIResponse(false,200,'here all orders ',$orders);
        return response()->json($response,200);

    }
    public function accept_order(Request $request)
    {
        $data = $request()->json()->all();

        $data=user_notifications::create([
            "notification_id"=>$data->notification_id,
            "user_id"=>$data->user_id,
            "status_id"=>$data->status_id,
        ]); 
        
        $response= APIHelpers::createAPIResponse(false,200,'here all orders ',$data);
        return response()->json($response,200);

    }
}