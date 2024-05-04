<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\foodecontroller;
use App\Http\Controllers\api\contactcontroller;
use App\Http\Controllers\api\articalecontroller;
use App\Http\Controllers\api\exercisecontroller;
use App\Http\Controllers\api\addarticalecontroller;
use App\Http\Controllers\api\lastedarticlecontroller;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//get and post articales ( web & app )

Route::get('getarticales',[articalecontroller::class,'index']);
Route::post('postarticales',[addarticalecontroller::class,'insert']);
Route::get('getarticale/{id}',[articalecontroller::class,'getArticle']);
Route::get('getLatestArticles' ,[articalecontroller::class,'getLatestArticles']);

//get and post contact us (web)

Route::post('postcontact',[contactcontroller::class,'store']);
Route::get('getcontact',[contactcontroller::class,'index']);

//get and post exercise getAllData to app

Route::get('exercise',[exercisecontroller::class,'index']);
Route::get('exercises',[exercisecontroller::class,'getAllData']);
Route::get('exercise/{id}',[exercisecontroller::class,'show']);

///food 7 reciep in app (arabic data)

Route::get('food',[foodecontroller::class,'index']);
Route::get('food/{id}',[foodecontroller::class,'show']);

//feedback post from app and show in website

Route::get('feedback',[contactcontroller::class,'show']);
Route::post('postfeedback',[contactcontroller::class,'push']);
