<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    public function product(){
        return $this->hasMany(Product::class);
    }
    public static function getCategory($lang)
    {
        return (array) DB::select("SELECT * FROM categories WHERE lang = '$lang'");
    }
    public static function buildTreeForSelectMultiLevel(Array $data, $parent = 0) {
        $tree = array();
        foreach ($data as $d) {
            $d = (array) $d;
            if ($d['parent'] == $parent) {
                $children = self::buildTreeForSelectMultiLevel($data, $d['id']);
                // set a trivial key
                if (!empty($children)) {
                    $d['_children'] = $children;
                }
                $tree[] = $d;
            }
        }
        return $tree;
    }
}
