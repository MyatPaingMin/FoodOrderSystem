<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Delivary;
use App\Models\Resturant;
use App\Http\Middleware\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillables = ['customer_id','admin_id','resturant_id','delivaryman_id','message','seen','deleted','status'];

    public function users(){
        return $this->belongsTo(User::class);
    }

} 
