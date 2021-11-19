<?php

namespace App\Http\Controllers\backend;

use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\rooms;

class Rooms_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rooms = Rooms::all();
        $response= APIHelpers::createAPIResponse(false,200,'',$rooms);
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return "here create room";
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
        $rooms=rooms::create([
            "num"=>$data->num,
            "person_num"=>$data->person_num,
            "bath_num"=>$data->bath_num,
            "desc"=>$data->desc,
            "type"=>$data->type,
            "floor_num"=>$data->floor_num,
            "availability"=>$data->availability,
            "price"=>$data->price,


        ]);

        $response= APIHelpers::createAPIResponse(false,201,'',$rooms);
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rooms= rooms::find($id);

        if (is_null($rooms)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$rooms);
            return response()->json($response,404);
        }

        $response= APIHelpers::createAPIResponse(false,200,'',$rooms);
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
        $rooms = Rooms::find($id);

        $response= APIHelpers::createAPIResponse(false,200,'',$rooms);
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
        $rooms= rooms::find($id);
        $rooms->update($data);

        if (is_null($rooms)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$rooms);
            return response()->json($response,404);
        }

        $response= APIHelpers::createAPIResponse(false,200,'',$rooms);
        return response()->json($response,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms= rooms::find($id);
        $rooms->destroy($id);
        if (is_null($rooms)){
            $response= APIHelpers::createAPIResponse(false,404,'not found',$rooms);
            return response()->json($response,404);
        }
    }
}
