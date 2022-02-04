<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id','cart_id','address','address2','country','state','zip','status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

}
