<?php

use App\Events\ChatSended;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/v1/getchats', MessageController::class);

Route::get('/test-broadcast-event', function () {
    ChatSended::dispatch("test");

    echo 'test broadcast event sangcahaya.id';
});

Route::post('/v1/upload/image', [MessageImageController::class, "retrieve"]);
Route::get('/v1/retrieve/image/{id}', [MessageImageController::class, "transmit"]);
Route::post('/v1/receiveSound', [MessageImageController::class, "receiveSound"]);
