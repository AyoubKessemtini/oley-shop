<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'user_id','product_id','qte','ordered','checkedout'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Oroder::class);
    }
}
