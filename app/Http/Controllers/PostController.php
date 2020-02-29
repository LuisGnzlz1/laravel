<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){

        for ($i = 0; $i < 1; $i++) {

            //example data to send
            $data = [
                'user_id' => 1,
                'title' => Str::random(20),
                'body' => 'lorem ipsum'
            ];

            //Activity 4
            PostJob::dispatch($data);
        }
    }
}
