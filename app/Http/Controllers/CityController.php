<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cities = City::all()->reverse();
        return view("cities.index", ['cities'=>$cities]);        //opcija 3
       // return view("cities.index", compact("cities"));        //opcija 1
       // return view("cities.index")->with( compact("cities")); //opcija 2
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        //https://amanj0314.medium.com/laravel-validation-using-request-53f7f90ceff7
        //$city = new City();    //ovo
        //$city = City::create($request->all());  //ili ovo ??
        $city->city= $request->city;
        $city->country_id= $request->input('country_id');
        $city->save();
        return redirect()->route('cities.index')->with('success','');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
      return view('cities.show', ['city'=>$city]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
