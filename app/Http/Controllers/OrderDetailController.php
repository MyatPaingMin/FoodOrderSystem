<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\orderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function viewVoucher($id){
        $list = orderDetail::where('orders.id','=',$id)
            ->select('orders.id as order_id','users.user_name','orders.created_at as order_date','order_details.id as item_id','products.image','products.name as product_name','order_details.quantity','order_details.created_at','products.price')
            ->leftJoin('orders','orders.id','order_details.order_id')
            ->leftJoin('users','users.id','orders.user_id')
            ->leftJoin('products','products.id','order_details.product_id')
            ->orderBy('order_details.order_id','DESC')
            ->paginate(5);
        return view('admin/order/voucher',compact('list'));
    }
}
