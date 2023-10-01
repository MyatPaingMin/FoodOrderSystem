<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivary extends Model
{
    use HasFactory;
    $fillable = ['user_id','delivaryman_name','gender','phone','address','status','current_location','rating','vehicle','available','on_duty','fixed_duty','duty_start','duty_end'];

    public function users(){
        return $this->belongsTo(User::class);
    }

}
