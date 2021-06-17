<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Test extends Model
{
    use HasTranslations;
    use HasFactory;
    public $table = 'tests';

    public $fillable = ['test'];
    public $translatable = ['test'];
}
