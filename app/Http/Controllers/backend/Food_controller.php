<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Helpers\APIHelpers;
use Illuminate\Http\Request;
use App\Models\food;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/lang/en.json'));
        $data = json_decode($jsonString, true);

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
        if($request->hasFile('img')){
            $file=$request->img;
            $new_file = time().$file-> getClientOriginalName();
            $file->move('/storage/food_img/'. $new_file);
        }

        $foods= food::find($id);
        $foods-> title= $request->title;
        $foods-> desc= $request->desc;
        $foods-> img= '/storage/food_img'. $new_file;
        $foods-> price= $request->price;
        $foods->update();

        if (is_null($foods)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$foods);
            return response()->json($response,404);
        }
        
        $response= APIHelpers::createAPIResponse(false,200,'',$foods);
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
        $foods= food::find($id);
        $foods->destroy($id);
        if (is_null($foods)){
            $response= APIHelpers::createAPIResponse(true,404,'not found',$foods);
            return response()->json($response,404);
        }
        $response= APIHelpers::createAPIResponse(false,200,'delete success',$foods);
        return response()->json($response,200);
    }
}