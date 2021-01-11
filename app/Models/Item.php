<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'note', 'quantity', 'price', 'order_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
