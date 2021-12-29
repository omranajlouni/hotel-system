<?php
use App\Http\Controllers\backend\Rooms_controller;
use App\Http\Controllers\backend\Food_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('reserve')->group(function(){
    //here to the customer not hotel guest
    Route::get('/fill_form',[Reserve_controller::class,'form']);
    //here to hotel guest
    Route::get('/add_reserve',[Reserve_controller::class,'store'])->name('reserve.store');
    Route::get('/accept_reserve',[Reserve_controller::class,'accept'])->name('reserve.accept');
    Route::get('/accept_extend',[Reserve_controller::class,'accept_extend'])->name('reserve.accept_extend');
});


Route::namespace('rooms')->group(function(){
    Route::get('/add_room',[Rooms_controller::class,'Create']);
    Route::Post('/add_room/store',[Rooms_controller::class,'Store'])->name('rooms.store');
    Route::get('/show_room',[Rooms_controller::class,'show'])->name('rooms.show');
    Route::get('/show_room{id}',[Rooms_controller::class,'index'])->name('rooms.index');
    Route::get('/show_room/edit{id}',[Rooms_controller::class,'edit'])->name('rooms.edit');
    Route::post('/show_room/update{id}',[Rooms_controller::class,'update'])->name('rooms.update');
    Route::post('/show_room/delete{id}',[Rooms_controller::class,'destroy'])->name('rooms.destroy');
});

Route::namespace('foods')->group(function(){
    Route::get('/add_food',[Food_controller::class,'Create']);
    Route::Post('/add_food/store',[Food_controller::class,'Store'])->name('food.store');
    Route::get('/show_food{id}',[Food_controller::class,'index'])->name('food.index');
    Route::get('/show_food',[Food_controller::class,'show'])->name('food.show');
    Route::get('/show_food/edit{id}',[Food_controller::class,'edit'])->name('food.edit');
    Route::post('/show_food/update{id}',[Food_controller::class,'update'])->name('food.update');
    Route::post('/show_food/delete{id}',[Food_controller::class,'destroy'])->name('food.destroy');
    Route::Post('/order_food',[Food_controller::class,'order_food'])->name('food.order_food');
    Route::get('/show_food_order',[Food_controller::class,'show_food_order'])->name('food.show_order');
    Route::get('/show_food_order/accept',[Food_controller::class,'accept_order'])->name('food.accept_order');
});

Route::namespace('service')->group(function(){
    Route::get('/add_service',[Service_controller::class,'Create']);
    Route::Post('/add_service/add_service_request',[Service_controller::class,'add_service_request'])->name('service.add_service_request');
    Route::get('/show_all_service_request',[Service_controller::class,'show'])->name('service.show');
    Route::get('/show_service_request{id}',[Service_controller::class,'index'])->name('service.index');
    Route::Post('/show_service_request/accept',[Service_controller::class,'accept'])->name('service.accept');
    Route::Post('/show_service_request/decline',[Service_controller::class,'decline'])->name('service.decline');
    //to see user services
    Route::get('/show_user_service',[Service_controller::class,'show_user_service'])->name('service.show_user_service');
   

});