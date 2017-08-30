<?php

namespace jakubenglicky\WebMonitoring\Controls;


use GuzzleHttp\Client;

class Tasks
{
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }
    public function checkStatusCode($url, $code)
    {
        $req = $this->client->request('GET',$url);

        if ($code == $req->getStatusCode()) {
            return true;
        } else {
            return $req->getStatusCode();
        }
    }
}