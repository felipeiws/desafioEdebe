<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import of countries and their other data';

    protected $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/FullCountryInfoAllCountries/JSON/debug?';

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
        //$response = Http::get($this->url);
        $response = Http::get("http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/FullCountryInfo/JSON/debug?sCountryISOCode=BR");
        $data = json_decode($response->getBody()->getContents());
        dd($data);
        return 0;
    }
}
