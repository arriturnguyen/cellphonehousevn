<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function product_options()
    {
    	return $this->hasMany('App\ProductOption');
    }

    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }
}