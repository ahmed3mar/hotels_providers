<?php
namespace App\Libraries\Providers;

use Illuminate\Support\Facades\Cache;

abstract class HotelProvider {

    protected $username;
    protected $password;
    protected $url;

    public function __construct()
    {

    }

    protected function post($url, $data, $headers = ['Content-Type' => 'text/xml','Accept-Encoding' => 'identity,deflate,gzip',]) {
        $client     = new \GuzzleHttp\Client();
        $response   = $client->request('POST', $url, ['headers'=>$headers,'body' => $data]);
        #  dd($response->getBody());
        return $response->getBody()->getContents();

    }

}
