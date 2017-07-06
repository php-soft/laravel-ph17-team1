<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function order_detail(){
        return $this->hasMany('App\Order_Detail','order_id','id');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function store(){
        return $this->belongsTo('App\Store');
    }
    
    public function payment(){
        return $this->belongsTo('App\Payment');
    }
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}
