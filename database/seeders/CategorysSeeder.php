<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categorys = [
      0=>[
            'name' => "Phones",
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",
            'img' => 'phones.jpg',
            'alias' => 'phones',
        ],
      1=>[
            'name' => "Cameras",
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",
            'img' => 'cameras.jpg',
            'alias' => 'cameras',
        ],
      2=>[
            'name' => "Laptops",
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy",
            'img' => 'laptops.jpg',
            'alias' => 'laptops',
      ],
    ];
    public function run()
    {
        foreach ($this->categorys as $category){
            \Illuminate\Support\Facades\DB::table('categories')->insert([
                'name' => $category['name'],
                'desc' => $category['desc'],
                'img' => $category['img'],
                'alias' => $category['alias'],
            ]);
        }
    }

}
