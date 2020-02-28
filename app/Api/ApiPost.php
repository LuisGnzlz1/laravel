<?php

namespace App\Api;

use App\Jobs\PostJob;
use GuzzleHttp\Exception\RequestException;

class ApiPost extends ApiAbstract
{
    private $url;

    public function __construct()
    {
        $this->url = config('api.url_api_post');
    }

    public function send(array $data)
    {

        try {

            $response = $this->client()->request('POST', $this->url, [
                'form_params' => $data
            ]);


            //return $response->getBody();

            $u = new \App\Post;
            $u->user_id = $data['user_id'];
            $u->title = $data['title'];
            $u->body = $data['body'];
            $u->save();

        } catch (RequestException $e){

            PostJob::dispatch($data);
        }
    }
}
