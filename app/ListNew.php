<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListNew extends Model
{
    public $timestamps = false;
    protected $table = "list_news";
    protected $fillable = ['name', 'slug'];
    public function news()
    {
        return $this->hasMany('App\News');
    }
}
