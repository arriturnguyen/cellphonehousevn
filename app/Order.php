<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'user_name', 'address', 'phone', 'amount',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
