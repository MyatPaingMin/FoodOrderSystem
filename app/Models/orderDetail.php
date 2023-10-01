<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','order_id','quantity','amount_price'];

    public function orders(){
        return $this->belongsTo(Order::class);
    }
    // public function users(){
    //     return $this->belongsTo(User::class);
    // }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
