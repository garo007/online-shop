<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','description','category_id'];
    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_products','product_id','user_id');
    }
}
