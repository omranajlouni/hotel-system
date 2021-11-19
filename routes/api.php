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
    Route::get('/add_reserve',[Reserve_controller::class,'check']);
    Route::get('/accept_reserve',[Reserve_controller::class,'accept']);
    Route::get('/accept_extend',[Reserve_controller::class,'accept_extend']);
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
});
