<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'title',
      'description',
      'image'
    ];

   public function category()
   {
       return $this->belongsToMany(Category::class, 'categories_products');
   }

}
