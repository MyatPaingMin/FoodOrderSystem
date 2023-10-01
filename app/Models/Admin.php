<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','admin_name','gender','phone','address','status'];

    public function users(){
        return $this->belongsTo(User::class);
    }
 
}
