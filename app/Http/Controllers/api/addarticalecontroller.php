<?php

namespace App\Http\Controllers\api;

use App\Models\Articale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class addarticalecontroller extends Controller
{
    public function insert(Request $request){
        $validator= validator::make($request->all(),[
            'name'=>'required|string|max:25',
            'description'=>'required',
            'image'=>'required|url',
            
    
         ]);
         if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
         }else{
            $art=Articale::create($request->all());
            ;
         }
            if($art){
                return response()->json([
                'status'=>200,
                'message'=>'Articale added successfully'
                ],200);
            }else{
                return response()->json([
                   'status'=>500,
                   'message'=>'articale not sent'
                ],500);
            }
    }
}
