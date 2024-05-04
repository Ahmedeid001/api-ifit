<?php

namespace App\Http\Controllers\api;
use App\Models\exercise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class exercisecontroller extends Controller
{
    public function index()
{
    $exe = exercise::all();

    if ($exe->count() > 0) {
        $exe->transform(function ($item) {
            $item->instructions = json_decode($item->instructions);
            $item->primary_muscles = json_decode($item->primary_muscles);
            $item->secondary_muscles = json_decode($item->secondary_muscles);
            
            return $item;
        });

        return response()->json([
            'status' => 200,
            'data' => $exe
        ], 200);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Data not found'
        ], 404);
    }
}

    
    public function show($id)
    {
        $exe= exercise::find($id);
        if($exe){
            return response()->json([
               'status'=>200,
                'data'=>$exe
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'not found'
            ],404);
        }
    }

    public function getAllData()
{
    try {
        $data = exercise::all();

        if ($data->isNotEmpty()) {
            $data->transform(function ($item) {
                $item->instructions = json_decode($item->instructions);
                
                // Explode and trim secondary muscles string into an array
                $item->secondary_muscles = explode(",", $item->secondary_muscles);
                $item->secondary_muscles = array_map('trim', $item->secondary_muscles);
                
                // Explode and trim primary muscles string into an array
                $item->primary_muscles = explode(",", $item->primary_muscles);
                $item->primary_muscles = array_map('trim', $item->primary_muscles);
                
                return $item;
            });

            // Return the data as JSON response
            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No data found in the database.'
            ], 404);
        }
    } catch (\Exception $e) {
        // Handle exceptions
        return response()->json([
            'status' => 500,
            'message' => 'Failed to fetch data: ' . $e->getMessage()
        ], 500);
    }
}

}