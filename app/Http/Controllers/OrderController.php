<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userorderlist(){
        $orders = Order::select('orders.id','orders.user_id','users.user_name','orders.total_price','orders.status','orders.created_at')
            ->when(request('search'),function($query){
                    $query->where('users.user_name','like','%'.request('search').'%');
                })
            ->when(request('startDate'),function($query){
                $query->when(request('endDate'),function($query){
                    $query->where('orders.created_at','<',request('endDate'));
                })->where('orders.created_at','>',request('startDate'));
            })

            ->leftJoin('users','users.id','orders.user_id')
            ->orderBy('created_at','DESC')
            ->paginate(5);
        return view('admin/order/order',compact('orders'));
    }


}
