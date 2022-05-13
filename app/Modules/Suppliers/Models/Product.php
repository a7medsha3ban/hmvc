<?php

namespace Suppliers\Models;
use Admins\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}


