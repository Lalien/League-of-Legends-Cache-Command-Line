<?php

namespace App\Service;

class LookupService {
    public function setDataSource($source) {
        return true;
    }

    public function lookupByName($summoner_name) {
        return new \StdClass();
    }
}