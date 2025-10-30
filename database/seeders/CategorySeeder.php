<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            ['name' => 'ANTI-MALARIA'], 
            ['name' => 'ANTIBIOTICS'], 
            ['name' => 'ASTHMA, COUGH AND COLD'], 
            ['name' => 'BEAUTY & SKIN SUPPLEMENTS'], 
            ['name' => 'BLOOD TONICS/ HEAMATONICS'], 
            ['name' => 'CREAMS AND LOTIONS'], 
            ['name' => 'EYEDROPS'], 
            ['name' => 'FERTILITY AND SEXUAL WELLNESS'], 
            ['name' => 'FITNESS AND VITALITY'], 
            ['name' => 'GERIATRIC CARE'], 
            ['name' => 'HOME CARE AND PERSONAL HYGIENE'], 
            ['name' => 'IMMUNE BOOSTERS'], 
            ['name' => 'INJECTIONS AND INFUSIONS'], 
            ['name' => 'LABORATORY TESTS '], 
            ['name' => 'MEDICAL DEVICE AND INSTRUMENT'],
            ['name' => 'MOTHER TO CHILD'],
            ['name' => 'OVERALL WELLNESS'],
            ['name' => 'PAIN MANAGEMENT'],
            ['name' => 'PRESCRIPTION ONLY MEDICINES'],
            ['name' => 'STOMACH DISCOMFORT'],
            ['name' => 'VACCINES'],
        ];

        foreach($data as $dd){
            Category::create($dd);
        }
    }
}
