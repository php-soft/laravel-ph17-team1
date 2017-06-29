<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	protected $table = 'categories';
   	protected $fillable = [
   	   	'name',
   	   	'slug',
   	   	'status',
   	   	'create_at',
   	   	'update_at'
   	];
   	public function products()
   	{
         return $this->hasMany('App\Product');
   	}
}
