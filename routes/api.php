<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CanteenController;
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
Route::get('canteen/{rfid:rfid}',[CanteenController::class,'pay']);
Route::get('eror',function(){
    return view('panel.eror.usernotfound');
})->name('usernotfound');
Route::get('Canteen/orders',[CanteenController::class,'order'])->name('api.canteen.order');
Route::get('Canteen/order/{canteen_id}',[CanteenController::class,'spesific'])->name('api.canteen.order-spesific');

