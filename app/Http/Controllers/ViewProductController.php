<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ViewProduct;
use Illuminate\Http\Request;

class ViewProductController extends Controller
{

    public function viewCount(Request $req){
        if(ViewProduct::where('user_id',$req->userID)->where('product_id',$req->productID)->get()->count() == 0){
            ViewProduct::create([
                "user_id" => $req->userID,
                "product_id" => $req->productID
            ]);

            $response = 'success';

            $targetProduct = Product::where('id',$req->productID)->first();
            $targetView = $targetProduct->view_count;
            $targetView++;

            Product::where('id',$req->productID)->first()->update(['view_count' => $targetView]);

            return response()->json($response,200);
        }else{
            $response = 'returner';
            return response()->json($response,200);
        }
    }

    public function love(Request $req){
        $userID = $req->userID;
        $productID = $req->productID;
        $response = 0;

        if(ViewProduct::select('love')->where('user_id',$userID)->where('product_id',$productID)->get()->count() > 0){
            $love = ViewProduct::select('love')
                               ->where('user_id',$userID)
                               ->where('product_id',$productID)
                               ->first();
            $response = $love->love;
        }
        return response()->json($response,200);
    }

    public function loveClick(Request $req){
        $userID = $req->userID;
        $productID = $req->productID;

        if(ViewProduct::select('love')->where('user_id',$userID)->where('product_id',$productID)->get()->count() > 0){
            ViewProduct::where('user_id',$userID)
                    ->where('product_id',$productID)
                    ->first()
                    ->update([
                        "love" => 1
                    ]);
        }else{
            ViewProduct::create([
                "user_id" => $userID,
                "product_id" => $productID,
                "love" => 1
            ]);
        }
        $response = 'loved';
        return response()->json($response,200);
    }
}
