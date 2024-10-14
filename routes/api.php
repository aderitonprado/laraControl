<?php

use App\Http\Controllers\AuthControllerApi;
use App\Http\Controllers\SupplyControllerApi;
use App\Http\Controllers\ThirdPartyControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/401', [AuthControllerApi::class, 'unauthorized'])->name('unauthorized');

Route::post('/auth/login', [AuthControllerApi::class, 'login']);
Route::post('/auth/refresh', [AuthControllerApi::class, 'refresh']);

Route::get('/user', [UserControllerApi::class, 'index']);
Route::put('/user', [UserControllerApi::class, 'update']);

Route::get('/supply', [SupplyControllerApi::class, 'index']);
Route::get('/supply/total', [SupplyControllerApi::class, 'totals']);
Route::post('/supply', [SupplyControllerApi::class, 'store']);
Route::post('/supply/show', [SupplyControllerApi::class, 'show']);
Route::put('/supply', [SupplyControllerApi::class, 'update']);
Route::delete('/supply', [SupplyControllerApi::class, 'destroy']);

Route::get('/thirdparty', [ThirdPartyControllerApi::class, 'index']);
Route::get('/thirdparty/total', [ThirdPartyControllerApi::class, 'totals']);
Route::post('/thirdparty', [ThirdPartyControllerApi::class, 'store']);
Route::post('/thirdparty/show', [ThirdPartyControllerApi::class, 'show']);
Route::put('/thirdparty', [ThirdPartyControllerApi::class, 'update']);
Route::delete('/thirdparty', [ThirdPartyControllerApi::class, 'destroy']);
