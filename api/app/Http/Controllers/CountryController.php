<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getCountry(Request $request)
    {
        $countries = Country::with('continent', 'flag', 'capital')->get();
        return response()->json($countries);
    }
}
