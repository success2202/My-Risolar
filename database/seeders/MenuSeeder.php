<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => 'Home', 'slug' => 'home'],
            ['name' => 'Contact Us', 'slug' => 'contact-us'],
            ['name' => 'About Us', 'slug' => 'about-us'],
            ['name' => 'Blog', 'slug' => 'blog'],
        ];

        foreach($data as $dd){
            Menu::create($dd);
        }
    }
}
