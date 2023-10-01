<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Chat;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductAction;
use App\Models\ProductResturant;
use App\Models\ResturantPropose;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function customers()
    {
        return $this->hasOne(Customer::class);
    }

    public function admins()
    {
        return $this->hasOne(Admins::class);
    }
    

    public function resturants()
    {
        return $this->hasOne(Resturants::class);
    }

    public function delivaries()
    {
        return $this->hasOne(Delivaries::class);
    }

    
    public function chats(){
        return $this->hasMany(Chat::class);
    }

    
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    
    public function orders(){
        return $this->hasMany(Order::class);
    }

    
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function product_actions(){
        return $this->hasMany(ProductAction::class);
    }

    public function product_resturants(){
        return $this->hasMany(ProductResturant::class);
    }

    public function resturant_proposes(){
        return $this->hasMany(ResturantPropose::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email','password','role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
