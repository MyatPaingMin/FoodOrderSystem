<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function pizzaList(Request $req){
        logger($req->status);
        // dd($req->status);
        if($req->status == 'asc'){
            $pizzas = Product::orderBy('created_at','asc')->get();
            return $pizzas;
        }else if($req->status == 'desc'){
            $pizzas = Product::orderBy('created_at','desc')->get();
            return $pizzas;
        }
    }

    // $pizzas = Product::when(request('created'),function($query){
    //     $query -> orderBy('created_at',request('created'));
    // }) -> when(request('price'),function($query){
    //     $query ->
    // })

    public function pizzaCat(Request $req){
        logger($req->all());

        if($req->catID == 'all'){
            $pizzas = Product::orderBy('created_at','asc')->get();
            return $pizzas;
        }else{
            $pizzas = Product::where('category_id',$req->catID)
                ->orderBy('created_at','asc')
                ->get();
            return $pizzas;
        }

    }

    public function pizzaOrderCat(Request $req){
        logger($req->all());
        // $id = $req->catID;
        // logger(gettype($id));
        // logger(settype($id, "integer"));
        // logger(gettype($id));

        // logger($id);


        $pizzas = Product::when(request('catID') != 'all',function($query){
                    $query -> where('category_id',request('catID'));
                })
                -> orderBy('created_at',request('order'))
                -> get();

        return $pizzas;
    }

    public function addToCart(Request $req){
        logger($req);
        $data = $this->getOrderData($req);

        logger($data);

        $collectionArray = Cart::where('product_id', $req->productID)
                ->where('user_id',Auth::user()['id'])
                ->get()->toArray();

        // $collectionArray = Cart::when('product_id' ==  $req->productID && 'user_id' == $req->userID, function(){

        // })

        if(count($collectionArray) >  0)
        {
            logger('it exists');
            $existing = Cart::where('product_id',$req->productID)
                -> where('user_id',Auth::user()['id'])
                -> first();
            logger($existing);
            $addedQty = $req->quantity + $existing->quantity;//->

            $newReq = [
                'user_id' => Auth::user()['id'],
                'product_id' => $req->productID,
                'quantity' => $addedQty
            ];

            Cart::where('product_id',$data['product_id'])
                -> where('user_id',Auth::user()['id'])
                -> update($newReq);

        }else{
            logger('it does not exist.');
            Cart::create($data);
        }


        $response = [
            'status' => 'success'
        ];
        return response()->json($response,200);

        // return redirect()->route('userHome')->with(['itemAdded'=>'Item inserted to Shopping Cart']);
    }

    public function pizzaOrderList(Request $req){
        logger($req);
        $totalPay = 0;
        foreach($req->all() as $dataCol){
            $totalPay += $dataCol['total'];
        }
        $createdOrder = Order::create([
            'user_id' => $req[0]['user_id'],
            'total_price' => $totalPay + 3000,
            'status' => 0
        ]);
        logger($createdOrder);

        foreach($req->all() as $dataArray){
            logger($dataArray);
            $datapack = $this->getOrderDetail($dataArray,$createdOrder['id']);
            orderDetail::create($datapack);
        }

        // for ($i=0; $i < count($req); $i++) {
        //     orderDetail::create($this->getOrderDetail($req[$i]));
        // }
        $response = [
            'status' => 'success'
        ];
        Cart::where('user_id',Auth::user()['id'])->delete();
        return response()->json($response,200);
    }

    public function orderPayment(){
        return view('user/Cart/payment');
    }

    private function getOrderDetail($dataArray,$orderID){
        logger($dataArray);
        return [
            'user_id' => $dataArray['user_id'],
            'product_id' => $dataArray['product_id'],
            'order_id' => $orderID,
            'quantity' => $dataArray['qty'],
            'total_price' => $dataArray['total']
        ];
    }

    private function getOrderData($req){
        return [
            'user_id' => $req->userID,
            'product_id' => $req->productID,
            'quantity' => $req->quantity
        ];
    }

    public function statusChange(Request $req){

        $status = $req->status;
        logger($status);

        $response = Order::select('orders.id','orders.user_id','users.user_name','orders.total_price','orders.status','orders.created_at')
                ->when(request('status') != 'all',function($query){
                    // logger('Status is'. $status);
                    $query -> where('orders.status','=',request('status'));
                })
                ->leftJoin('users','users.id','orders.user_id')
                ->orderBy('created_at','DESC')
                ->paginate(5);

        logger($response);
        return $response;
    }

    public function admitChange(Request $req){
        Order::where('id',$req->orderID)->update(['status'=> $req->status]);

        $response = 'successful';
        return response()->json($response,200);
    }

    public function cartAmount(){
        $items = Cart::where('user_id',Auth::user()['id'])->get()->count();
        $response = [
            'listAmount' => $items
        ];
        logger($response);
        return response()->json($response,200);
    }
}
