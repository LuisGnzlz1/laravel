<?php

namespace App\Console\Commands;

use App\FailedJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CheckFailedJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retry:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Table failed Jobs and retry all';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jobsList = FailedJob::all()->count();

        if($jobsList > 0){
            Artisan::call('queue:retry all');
        }

        Log::error('retry jobs');

    }
}
