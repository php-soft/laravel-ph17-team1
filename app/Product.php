<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'sale_price',
        'description',
        'image',
        'accessory',
        'tophot',
        'warranty_moth',
        'status',
        'category_id',
        'factory_id',
        'back_camera_id',
        'front_camera_id',
        'battery_id',
        'connect_id',
        'design_id',
        'opera_system_id',
        'screen_id',
        'utility_id',
        'color_id',
        'memory_id',
        'vote_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function backCamera()
    {
        return $this->belongsTo('App\BackCamera');
    }

    public function frontCamera()
    {
        return $this->belongsTo('App\FrontCamera');
    }

    public function battery()
    {
        return $this->belongsTo('App\Battery');
    }

    public function connect()
    {
        return $this->belongsTo('App\Connect');
    }

    public function design()
    {
        return $this->belongsTo('App\Design');
    }

    public function operaSystem()
    {
        return $this->belongsTo('App\OperaSystem');
    }

    public function screen()
    {
        return $this->belongsTo('App\Screen');
    }

    public function utility()
    {
        return $this->belongsTo('App\Utility');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function memory()
    {
        return $this->belongsTo('App\Memory');
    }

    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    public function storeProducts()
    {
        return $this->belongsToMany('App\StoreProduct');
    }

    public function promotionProducts()
    {
        return $this->belongsToMany('App\PromotionProduct');
    }

    public function voteProducts()
    {
        return $this->belongsToMany('App\VoteProduct');
    }
}