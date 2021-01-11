<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipto extends Model
{
    protected $fillable = ['order_id','name', 'city', 'address', 'country'];

    protected $hidden = ['created_at', 'updated_at'];


    public function order(){
        return $this->belongsTo(Order::class);
    }
}
