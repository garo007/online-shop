<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProducts extends Model
{
    use HasFactory;
    public $fillable = ['user_id','product_id','created_at','updated_at'];
}
