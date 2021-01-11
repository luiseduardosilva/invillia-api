<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['person_id'];

    protected $hidden = ['created_at', 'updated_at'];

    function person(){
        return $this->belongsTo(Person::class);
    }

    public function shiptos(){
        return $this->hasOne(Shipto::class);
    }

    public function items(){
        return $this->hasMany(Shipto::class);
    }
}
