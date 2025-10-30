<?php

use App\Models\CountryCurrency;
use Flutterwave\Util\Currency;
use Vinkla\Hashids\Facades\Hashids;
use GuzzleHttp\Client;


if(!function_exists('ClientRequest'))
{
    function ClientRequest($method, $url, $data,$token)
    {
        $client = new Client();
        $res = $client->request($method, $url, [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            $data
        ]
    );
    $response = json_decode($res->getBody(), true);
    return $response;
    }
}



if(!function_exists('trimInput')){
    function trimInput($input){
        return str_replace(['/', ' ','*', '+', '=', '<', '>', '&', '^', '%', '$', '#', '@', '!', '[', ']', ], '', $input);
    }
}

if(!function_exists('moneyFormat')){
    function moneyFormat($currency){
        return '₦'.number_format($currency);
    }
}

if(!function_exists('auth_user')){

    function auth_user(){
        return auth()->user();
    }
}

if(!function_exists('addHashId')){
    function addHashId($data){
        foreach($data as $dd){
            $dd->hashid = Hashids::connection('products')->encode($dd->id);
            $dd->productUrl = trimInput($dd->name??null);
        }
    return $data;
    }
}

if(!function_exists('shippingBase')){
    function shippingBase($param = null){
        return 'https://api.jand2gidi.com.ng/api/v1/'.$param;
    }
}

if(!function_exists('moneyFormat')){
    function moneyFormat($data){
        return '₦'.number_format($data,2);
    }
}

if(!function_exists('GenerateRef')){

    function GenerateRef($size){
        return substr(str_replace(['[', ']', '+', '=','!','@','#','%','&','*','(',')','/'], '', base64_encode(random_bytes(16))),0, $size);
    }
}

if(!function_exists('decodeHashid')){
    function decodeHashid($id){
        $id = Hashids::connection('products')->decode($id);
        if(is_array($id)){
            return $id[0];
        }
        return $id;
    }
}

if(!function_exists('convertPercent')){
    function convertPercent($number, $percent){
        return ($number*$percent)/100;
    }
}


function getUserLocationData()
{
$getIP = request()->ip();  
// $getIP = '102.88.33.150';
$url = "ipinfo.io/$getIP?token=882a5aae24fada";
return curlRequest($url);
}


function updateExchangeRate()
{
    $url = "https://v6.exchangerate-api.com/v6/07fb10ee70b2af7ed9f0d8a9/latest/NGN";
return curlRequest($url);
}


if(!function_exists('getCountryCurrency'))
{
  function  getCountryCurrency()
    {
        $currencyMap = [
            'NG' => 'NGN',  
            'US' => 'USD',  
            'UG' => 'UGX',  
            'KE' => 'KES',  
            'ZA' => 'ZAR',  
            'ZM' => 'ZMW',  
            'GH' => 'GHS',  
            'TZ' => 'TZS',  
            'RW' => 'RWF',  
            'CM' => 'XAF',  
            'SN' => 'XOF',  
            'EG' => 'EGP',  
            'GB' => 'GBP',  
            'FR' => 'EUR', 
            'DE' => 'EUR'   
        ];
         
        foreach($currencyMap as $ss => $value)
        {
            CountryCurrency::create([
                'country' => $ss,
                'currency' => $value
            ]);
        }
       return $currencyMap;
    }

   function curlRequest($url)
   {
  
    $curl = curl_init();
   curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json'
    ]
    ]);
    $resp = curl_exec($curl);
    $url_close = curl_close($curl);
    $res = json_decode($resp, true);
    return $res;
   }
}
