<?php

namespace App\Console\Commands;

use App\Capital;
use App\Continent;
use App\Country;
use App\Flag;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Constraint\Count;

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

    protected $urlContinents = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfContinentsByName/JSON/debug?';
    protected $urlCountries = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/FullCountryInfoAllCountries/JSON/debug?';

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
        $response = $this->getResponse($this->urlContinents);
        if (Continent::count() != count($response)){
            foreach ($response as $continent) {
                $con = Continent::where('initials',$continent->sCode)->count();
                if (!$con){
                    Continent::create([
                        'name' => $continent->sName,
                        'initials' => $continent->sCode,
                    ]);
                }
            }
        }

        $data = $this->getResponse($this->urlCountries);
        if (Country::count() != count($data)){
            foreach ($data as $country) {
                $cou = Country::where('name',$country->sName)->count();
                if (!$cou){
                    $continent = Continent::where('initials',$country->sContinentCode)->first();
                    $flag = Flag::create([
                        'url' => $country->sCountryFlag
                    ]);
                    $capital = Capital::create([
                        'name' => $country->sCapitalCity
                    ]);
                    Country::create([
                        'name' => $country->sName,
                        'continents_id' => $continent->id,
                        'flags_id' => $flag->id,
                        'capitals_id' => $capital->id,
                    ]);
                }
            }
        }
        return 1;
    }

    /**
     * @param $url
     * @return array
     */
    private function getResponse($url)
    {
        $response = Http::get($url);
        return (array) json_decode($response->getBody()->getContents());
    }
}
