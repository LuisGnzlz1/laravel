<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){


        for ($i = 0; $i < 2; $i++) {
            $data = [
                'user_id' => 1,
                'title' => Str::random(20),
                'body' => 'lorem ipsum'
            ];

            PostJob::dispatch($data);
        }
    }
}
