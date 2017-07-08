<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utility;

class Utility extends Model
{
    protected $table = 'utilities';
    protected $fillable = [
        'advanced_security',
        'special_function',
        'recording',
        'radio',
        'movie',
        'music'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public static function search($nguyenkhoi, $kimloai, $kinh)
    {
        $result = Utility::where('advanced_security', 'like', '%' .$nguyenkhoi. '%')->where('material', 'like', '%' .$kimloai. '%')->where('material', 'notlike', '%' .$kinh. '%')->get();
        return $result;
    }
}
