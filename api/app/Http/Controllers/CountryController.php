<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountries(Request $request)
    {
        $countries = Country::with('continent', 'flag', 'capital')->get();
        return response()->json($countries);
    }
    public function getCountry($country, Request $request)
    {
        $data = Country::where('id',$country)->with('continent', 'flag', 'capital')->first();
        return response()->json($data);
    }
}
