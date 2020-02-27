<?php

namespace App\Api;

use GuzzleHttp\Client;

abstract class ApiAbstract
{

    abstract protected function send(array $data);

    public function client()
    {
        return $this->client = new Client();
    }
}
