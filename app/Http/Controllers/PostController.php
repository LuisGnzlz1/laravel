<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){

        for ($i = 0; $i < 2; $i++) {

            //data example sender
            $data = [
                'user_id' => 1,
                'title' => Str::random(20),
                'body' => 'lorem ipsum'
            ];

            //ACTIVITY 4
            PostJob::dispatch($data);
        }
    }
}
