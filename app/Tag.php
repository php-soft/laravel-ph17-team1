<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = [
        'id', 'name'
    ];

    public function news()
    {
        return $this->belongsToMany('App\News', 'news_tags', 'tag_id', 'news_id');
    }
}
