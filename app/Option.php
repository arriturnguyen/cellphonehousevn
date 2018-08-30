<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function product_options()
    {
    	return $this->hasMany('App\ProductOption');
    }

    public function option_group()
    {
    	return $this->belongsTo('App\OptionGroup');
    }
}
