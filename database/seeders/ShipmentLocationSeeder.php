<?php

namespace Database\Seeders;

use App\Models\ShipmentLocation;
use Illuminate\Database\Seeder;

class ShipmentLocationSeeder extends Seeder
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
            [
                "location" => "Zaria",
                "states" => "Kaduna"
            ],
            [
                "location" => "Yola/Jalingo",
                "states" => "Taraba"
            ],
            [
                "location" => "Yenagoa",
                "states" => "Bayelsa"
            ],
            [
                "location" => "Uyo",
                "states" => "Akwa Ibom"
            ],
            [
                "location" => "Umuahia",
                "states" => "Abia"
            ],
            [
                "location" => "Sokoto/Gusau",
                "states" => "Zamfara"
            ],
            [
                "location" => "Sapele",
                "states" => "Delta"
            ],
            [
                "location" => "Warri",
                "states" => "Delta"
            ],
            [
                "location" => "Port Harcourt",
                "states" => "Rivers"
            ],
            [
                "location" => "Oshogbo",
                "states" => "Osun"
            ],
            [
                "location" => "Owerri",
                "states" => "Imo"
            ],
            [
                "location" => "Onitsha",
                "states" => "Anambra"
            ],
            [
                "location" => "Nsukka",
                "states" => "Enugu"
            ],
            [
                "location" => "Nnewi",
                "states" => "Anambra"
            ],
            [
                "location" => "Minna",
                "states" => "Niger"
            ],
            [
                "location" => "Maiduguri",
                "states" => "Borno"
            ],
            [
                "location" => "Makurdi",
                "states" => "Benue"
            ],
            [
                "location" => "Lokoja",
                "states" => "Kogi"
            ],
            [
                "location" => "lafia",
                "states" => "Nassarawa"
            ],
            [
                "location" => "Katsina",
                "states" => "Katsina"
            ],
            [
                "location" => "kano",
                "states" => "Kano"
            ],
            [
                "location" => "kaduna",
                "states" => "Kaduna"
            ],
            [
                "location" => "jos",
                "states" => "Plateau"
            ],
            [
                "location" => "Ilorin",
                "states" => "Kwara"
            ],
            [
                "location" => "Ijebu ode",
                "states" => "Ogun"
            ],
            [
                "location" => "ife",
                "states" => "Osun"
            ],
            [
                "location" => "Ibadan",
                "states" => "Oyo"
            ],
            [
                "location" => "Gwagwalada",
                "states" => "Abuja Capital Territory"
            ],
            [
                "location" => "Enugu",
                "states" => "Enugu"
            ],
            [
                "location" => "Eket",
                "states" => "Akwa Ibom"
            ],
            [
                "location" => "Calabar",
                "states" => "Cross River"
            ],
            [
                "location" => "Bonny",
                "states" => "Rivers"
            ],
            [
                "location" => "Benin",
                "states" => "Edo"
            ],
            [
                "location" => "Bauchi",
                "states" => "Bauchi"
            ],
            [
                "location" => "Asaba",
                "states" => "Delta"
            ],
            [
                "location" => "Akure",
                "states" => "Ondo"
            ],
            [
                "location" => "Ado Ekiti",
                "states" => "Ekiti"
            ],
            [
                "location" => "Abuja",
                "states" => "Abuja Capital Territory"
            ],
            [
                "location" => "Abakaliki",
                "states" => "Ebonyi"
            ],
            [
                "location" => "Abeokuta",
                "states" => "Ogun"
            ],
            [
                "location" => "Aba",
                "states" => "Abia"
            ],
            ["states" => 'Lagos', "location" => json_encode([
                
                     "Orchid road",
                  "Ikotun",
                     "Igando",
                  "Idimu", "Ejigbo", "Egbeda", "Dopenmu","Alimosho", "Akonwonjo","Abule Egba", "Unilag Estates",
                    "Orile Agege", "Omole Phase 2", "Okota", "Ojota",
                     "Ojodu Berger", "Mile 12","Magodo Isheri","Kirikiri",
                   "Ketu","Iyana Ipaja", "Itire", "Isolo","Festac",
                    "Fagba", "Amuwo Odofin","Alapere","Ajegunle","Agege","Shogunle",
                   "Ojodu Grammar School", "Mushin","Magodo Shangisha",
                   "Mafoluku", "International Airport","Ijora", "Idi Araba",
 "Ajao Estates", "Ago Palace", "Yaba","Surulere","Shomolu", "Palmgrove","Oyingbo","Owonronshoki",
"Oshodi","Oregun", "Onipanu", "Onigbongbo", "Omole Phase 1", "Ogudu", "Ogba","Obanikoro","Mende",
 "Maryland","Local Airport", "Jibowu","Iwaya", "Iponri","Ilupeju","Ikorodu Road","Ikeja",
"Iganmu", "Gbagada", "Ebute Metta","Costain", "Bariga", "Anthony", "Alausa","Alagomeji",
"Agidingbi", "Sangotedo", "Lamgbasa","Thomas Estates","Lagos Business School", "Badore",
 "Abraham Adesanya","Ocean Bay Estates and Environs","Lekki County Estates","Ajah","Victoria Island",
 "VGC", "Oniru", "Obalende","Marwa","Marina", "Lekki 1","Lagos Island","Ikoyi","Ikota",
 "Igbo Efon", "Idumota","Elegushi","CMS","Chevron","Broad Street","Apongbon", "Agungi",
            ])

            ]
        ];

        foreach($data as $dd){
            ShipmentLocation::create($dd);
        }
    }
}
