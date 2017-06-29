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
        'vote_id',
        'create_at',
        'update_at'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function backCamera()
    {
        return $this->hasOne('App\Back_Camera');
    }

    public function frontCamera()
    {
        return $this->hasOne('App\Front_Camera');
    }

    public function battery()
    {
        return $this->hasOne('App\Battery');
    }

    public function connect()
    {
        return $this->hasOne('App\Connect');
    }

    public function design()
    {
        return $this->hasOne('App\Design');
    }

    public function operaSystem()
    {
        return $this->hasOne('App\Opera_System');
    }

    public function screen()
    {
        return $this->hasOne('App\Screen');
    }

    public function utility()
    {
        return $this->hasOne('App\Utility');
    }

    public function color()
    {
        return $this->hasOne('App\Color');
    }

    public function memory()
    {
        return $this->hasOne('App\Memory');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
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
