<?php 
namespace App\Services;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\RequestException;

use GuzzleHttp\Client;

class Base {

    public $url;
    public $method;
    public $jsonBody;
    public $apiKey;
    //rps

    public function __construct($url, $method, $apiKey,  $jsonBody = [])
    {
        $this->url = $url;
        $this->method = $method;
        $this->jsonBody = $jsonBody;
        $this->apiKey = $apiKey;
    }

    public function Client(){
   
    try{
        $client = new Client();
    $res = $client->request($this->method, $this->url, [
        'headers' => [
            'Authorization' => 'Bearer '.config('app.GIDIAPIKey'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-API-KEY' => $this->apiKey
        ],
        'json' => $this->jsonBody
    ]);
    $res = json_decode($res->getBody(),true);
 
    return $res;
    }catch(\Exception $e){
  
     return $e->getMessage();
    }
}


}



