<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'price', 'old_price', 'description', 'images', 'status', 'in_stock'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function productOptions()
    {
    	return $this->hasMany('App\ProductOption');
    }

    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }
}
