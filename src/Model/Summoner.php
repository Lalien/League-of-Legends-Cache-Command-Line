<?php
namespace App\Model;

class Summoner {
    public $id;
    public $name;
    public function __construct($data) {
        $data = json_decode($data);
        $this->id = $data->accountId;
        $this->name = $data->name;
    }
}