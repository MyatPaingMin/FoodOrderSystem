<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductResturant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductResturant extends Model
{
    use HasFactory;

    protected $fillables = ['product_id','resturant_id','remark'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
