<?php

namespace App\Service;
use App\Model\Summoner;
use GuzzleHttp;

class LookupService {
    private $url;
    private $method;
    private $params = [];

    public function __construct() {
        $this->client = new GuzzleHttp\Client();
    }

    public function setDataSource($source) {
        return true;
    }

    public function lookupByName($summoner_name) {
        $this->url = getenv("API_URL") . "/get/" . $summoner_name; 
        $this->method = "GET";
        $this->params = [];
        $res = $this->search();
        if ($res->getStatusCode() == 200) {
            return new Summoner($res->getBody());
        } else {
            return false;
        }
    }

    private function search() {
        return $this->client->request($this->method, $this->url, $this->params);
    }
}