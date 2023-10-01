<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use App\Models\ProductResturant;
use App\Models\ResturantPropose;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resturant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','resturant_name','operator_name','operator_position','phone','address','type_description','rating','open_time','close_time','available','status'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function product_resturants(){
        return $this->hasMany(ProductResturant::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public function resturant_proposes(){
        return $this->hasMany(ResturantPropose::class);
    }
}
