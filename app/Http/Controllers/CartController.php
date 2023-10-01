<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartPage(){
        $items = Cart::where('user_id',Auth::user()['id'])
            ->leftJoin('products','carts.product_id','products.id')
            ->get()->toArray();

        $totalPrice = 0;
        foreach ($items as $item){
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('user/Cart/cart',compact(['items','totalPrice']));
    }
}
