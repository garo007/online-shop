<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message','outgoing_id','incoming_id','status'];
    public function user(){

        return $this->belongsToMany(User::class,'messages','id','outgoing_id');

    }
}
