<?php

namespace App\Http\Controllers\api;
use App\Models\contact;
use App\Models\feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class contactcontroller extends Controller
{
    public function store(Request $request){
        $validator= validator::make($request->all(),[
            'name'=>'required|string|max:20',
            'email'=>'required|email|max:20',
            'phone'=>'required',
           'message'=>'required|max:200',
    
         ]);
         if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
         }else{
            $contact=Contact::create($request->all());
            //$contact= Contact::create($request->all());
         }
            if($contact){
                return response()->json([
                'status'=>200,
                'message'=>'message sent successfully'
                ],200);
            }else{
                return response()->json([
                   'status'=>500,
                   'message'=>'message not sent'
                ],500);
            }
    }

    public function index()
    {
        $cont= contact::all();
        if($cont->count()>0){

            return response()->json([
                'status'=>200,
                'data'=>$cont
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'not found'
            ],200);

        }
    }

        //for feedback
    public function show()
    {
        $cont= feedback::all();
        if($cont->count()>0){

            return response()->json([
                'status'=>200,
                'data'=>$cont
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'not found'
            ],200);

        }
    }
    
    
    public function push(Request $request){
        $validator= validator::make($request->all(),[
            'name'=>'required|string|max:20',
            'msg'=>'required',
            
    
         ]);
         if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
         }else{
            $fd=feedback::create($request->all());
         }
            if($fd){
                return response()->json([
                'status'=>200,
                'message'=>'message sent successfully'
                ],200);
            }else{
                return response()->json([
                   'status'=>500,
                   'message'=>'message not sent'
                ],500);
            }
    }
}
