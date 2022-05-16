<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Month;
use Illuminate\Http\Request;
use App\Models\SolarIrradiance;
use App\Http\Controllers\Controller;

class SolarIrradianceController extends Controller
{
    // List all solar irradiance data
    public function list()
    {
        return view('irradiance.index', 
        ['solarIrradiances' => SolarIrradiance::all()]
    );
    }

    // List Single solar irradiance data
    public function show(SolarIrradiance $solarIrradiance)
    {
        return view('irradiance.show', [
            'solarIrradiance' => $solarIrradiance
        ]);
    }

    // Show form to create new solar irradiance data
    public function create()
    {
        $months = Month::all();
        $cities = City::all();
        
        return view('irradiance.create', [
            'months' => $months,
            'cities' => $cities 
        ]);
    }

    // Store new solar irradiance data
    public function store(Request $request)
    {
        $data = file_get_contents($request->json_file);
        $json = json_decode($data, true);
        $solarIrradiance = new SolarIrradiance;

        for($i = 0; $i < count($json['outputs']['daily_profile']); $i++) {
            $solarIrradiance->{$i} = $json['outputs']['daily_profile'][$i]['G(n)'];
        }
        $solarIrradiance->month = $request->month;
        $solarIrradiance->city_country = $request->city_country;
        $solarIrradiance->save();

        return redirect('/list')->with('message', 'Solar Irradiance data has been added!');
    }


}
