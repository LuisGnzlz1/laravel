<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Api
{

    private $url;

    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = config('api.url_api');
    }


    public function send(array $data)
    {

        try {

            $response = $this->client->request('POST', $this->url, [
                'form_params' => $data
            ]);


            $u = new \App\User;
            $u->name = $data['name'];
            $u->password = bcrypt($data['pass']);
            $u->email = $data['email'];
            $u->save();

        } catch (RequestException $e){

            event(new \App\Events\SendPostEvent($data));
        }
    }
}
