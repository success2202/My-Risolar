<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'site_name' => 'Sanlive Medhub',
            'site_logo' => 'logo.png', 
            'site_phone' => '08039366207',
            'site_email' => 'mikkynoble@gmail.com', 
            'site_copyright' => 'All rights Reserved', 
            'footer_menu' => '', 
            'opening_hours' => '24hrs', 
            'facebook' => 'facebook.com', 
            'twitter' => 'twitter.com',
            'linkedIn' => 'Linkedin',
            'instagram' => 'instagram', 
            'address' => 'Lagos, Nigeria'
        ]);
    }
}
