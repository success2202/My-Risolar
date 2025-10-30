<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'first_name' => 'sanlive', 'last_name' => 'pharm' ,'email' => 'support@sanlivepharm.com', 'phone' => '08028928282', 'password' => hash::make('mike123'),
        ]);

           
    }
}
