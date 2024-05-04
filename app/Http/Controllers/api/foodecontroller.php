<?php

namespace App\Http\Controllers\api;

use App\Models\food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class foodecontroller extends Controller
{
    public function index()
    {
        $foods = food::all();
        
        if($foods->count() > 0) {

            $foods->transform(function ($item) {
                $item->name = html_entity_decode($item->name, ENT_QUOTES, 'UTF-8');
                $item->ingredients = html_entity_decode($item->ingredients, ENT_QUOTES, 'UTF-8');
                $item->method = html_entity_decode($item->method, ENT_QUOTES, 'UTF-8');
                return $item;
            });
    
            return response()->json([
                'status' => 200,
                'data' => $foods
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ], 404);
        }
    }

    public function show($id)
    {
        $food= food::find($id);
        if($food){
            return response()->json([
               'status'=>200,
                'data'=>$food
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'not found'
            ],404);
        }
    }
    
}
