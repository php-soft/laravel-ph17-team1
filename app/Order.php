<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;
    
    protected $table = "orders";

    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}
