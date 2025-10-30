<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
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
            [ 'title' => 'Fully Quipped room', 'content' => 'We have all it take to give you best', 'image_path' => 'slider1.jpg'],
            [ 'title' => 'Powersteal machines and meds', 'content' => 'We have all it take to give you best', 'image_path' => 'slider1.jpg'],
            [ 'title' => 'AntiBacterial Medical Care', 'content' => 'We have all it take to give you best', 'image_path' => 'slider1.jpg']
        ];

        foreach($data as $dd){
            Slider::create($dd);
        }
    }
}
