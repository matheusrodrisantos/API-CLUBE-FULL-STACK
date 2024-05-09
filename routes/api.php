<?php

use App\Http\Controllers\API\V1\InvoiceController;
use App\Http\Controllers\API\V1\UserController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::prefix('v1')->group(function(){

    Route::prefix('users')->group(function(){
        Route::get('/',[UserController::class,'index']);
        Route::get('/{user}',[UserController::class,'show']);
    });
    /*
    Route::prefix('invoices')->group(function(){
        Route::get('/',[InvoiceController::class, 'index']);
        Route::get('/{invoice}',[InvoiceController::class, 'show']);

        Route::post('/',[InvoiceController::class, 'store']);
        Route::put('/{invoice}',[InvoiceController::class, 'update']);

        Route::delete('/{invoice}',[InvoiceController::class, 'destroy']);
    });*/
    
    Route::apiResource('invoices',InvoiceController::class);
});

