<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title','description','category_id','image','price','state','link'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    
}
