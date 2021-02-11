<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateAPIProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateAPIProperties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update API Properties';

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
     * @return int
     */
    public function handle()
    {
        $url = 'https://trialapi.craig.mtcdevserver.com/api/properties?api_key='.config('property.api_key')
            .'&page[number]=1&page[size]=100';
        for ($i = 0; true; $i++) {
            $response = Http::get($url);
            $properties = collect($response->json());

            \App\Jobs\UpdateAPIProperties::dispatch(collect($response->json()['data']));
            $url = $properties['next_page_url'] ?: null;

            if ($url === null) {
                break;
            }
        }
        return 0;
    }
}
