<?php

namespace App\Http\Controllers\api; 
use App\Models\art;
use App\Models\Articale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class articalecontroller extends Controller
{
    public function index()
    {
        $articales= Articale::all();
        if($articales->count()>0){

            return response()->json([
                'status'=>200,
                'data'=>$articales
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'not found'
            ],200);

        }
    }



    public function getArticle($id)
    {
        
        $article = Articale::find($id);

        if ($article) {
            return response()->json([
                'status' => 200,
                'data' => $article
            ], 200);
        } else {

            return response()->json([
                'status' => 404,
                'message' => 'Article not found'
            ], 404);
        }
    }

    public function getLatestArticles()
    {
        try {
             
            $latestRecords = art::orderBy('created_at', 'desc')->take(3)->get();

            if ($latestRecords->isNotEmpty()) {
                 
                return response()->json([
                    'status' => 200,
                    'data' => $latestRecords
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No records found in subart table.'
                ], 404);
            }
        } catch (\Exception $e) {
             
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch data: ' . $e->getMessage()
            ], 500);
        }
    }
    
}