<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\orderDetail;
use App\Models\ProductAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','admin_id','description','image','price','waiting_time'];

    public function order_details(){
        return $this->hasMany(orderDetail::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function product_resturants(){
        return $this->hasMany(ProductResturant::class);
    }
    
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function product_actions(){
        return $this->hasMany(ProductAction::class);
    }
}
