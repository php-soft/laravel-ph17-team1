<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
