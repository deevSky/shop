<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function subcategory(){
       return $this->belongsToMany(Subcategory::class, 'products_subcategories');
   }

}
