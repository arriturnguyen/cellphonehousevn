<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function productOptions()
    {
    	return $this->hasMany('App\ProductOption');
    }

    public function optionGroup()
    {
    	return $this->belongsTo('App\OptionGroup');
    }
}
