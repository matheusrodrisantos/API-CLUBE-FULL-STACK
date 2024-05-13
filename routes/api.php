<?php

use App\Http\Controllers\API\V1\InvoiceController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/teste', [TesteController::class,'index'])->middleware('auth:sanctum');

    Route::middleware('auth:sanctum')->group(function(){
        Route::prefix('users')->group(function(){
            Route::get('/',[UserController::class,'index']);
            Route::get('/{user}',[UserController::class,'show']);
        });
        Route::post('/logout',[AuthController::class, 'logout']);    
    });
    
    Route::apiResource('invoices',InvoiceController::class);
});

