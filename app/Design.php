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

    public static function search($nguyenkhoi, $kimloai, $kinh)
    {

        $result = Design::where('design', 'like', '%' . $nguyenkhoi . '%')->where('material', 'like', '%' . $kimloai . '%')->where('material', 'not like', '%' . $kinh . '%')->pluck('id');
        return $result;
    }
}
