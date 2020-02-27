<?php

namespace App\Console\Commands;

use App\Api\ApiPost;
use Illuminate\Console\Command;

class sendPost extends Command
{
    private $api;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:send {--data=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Post Information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ApiPost $api)
    {
        parent::__construct();

        $this->api = $api;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = $this->option('data');

        return $this->api->send($data);
    }
}
