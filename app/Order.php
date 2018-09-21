<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    const PENDING_ID = 1;
    const APPROVED_ID = 2;
    const SHIPPED_ID = 3;
    const CANCEL_ID = 4;

    const PENDING_STATUS = 'Pending';
    const APPROVED_STATUS = 'Approved';
    const SHIPPED_STATUS = 'Shipped';
    const CANCEL_STATUS = 'Cancel';

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

    public function processingStatus()
    {
        $status = Order::find($this->id)->status;
        switch ($status) {
             case self::PENDING_ID:
                return self::PENDING_STATUS;
                break;
            case self::APPROVED_ID:
                return self::APPROVED_STATUS;
                break;
            case self::SHIPPED_ID:
                return self::SHIPPED_STATUS;
                break;    
            case self::CANCEL_ID:
                return self::CANCEL_STATUS;
                break;
           
        }
    }

    public function scopeProcessStatus($query)
    {
        return $query->select('status', DB::raw('count(status) as number'))
                    ->groupBy('status');
    }
}
