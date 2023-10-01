<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use App\Models\orderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','total_price','status'];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function order_details(){
        return $this->hasMany(orderDetail::class);
    }
}
