<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = 'designs';
    protected $fillable = [
        'design',
        'material',
        'size',
        'weigth'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
