<?php

namespace App\Models;

use App\Models\User;
use App\Models\Resturant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResturantPropose extends Model
{
    use HasFactory;

    protected $fillables = ['resturant_id','image','video','new_product_name','new_product_title','new_product_introduction','new_product_description','new_product_price','waiting_time','new_food','status','remark_from_admin'];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
