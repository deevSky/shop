<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product(){
        return $this->belongsToMany(Product::class, 'products_subcategories');
    }
}
