<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Status;
use Illuminate\Validation\Rules\Enum;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //->active()
        $countries = Countries::orderBy('name')->paginate(10);
        return view('admin/countries/index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/countries/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'countrycode' => 'required',
            'status' => ['required', new Enum(Status::class)],
        ]);

        $countries =Countries::create([
            'name' => $request->name,
            'countrycode' => $request->countrycode,
            'status' => $request->status
        ]);
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Countries $country)
    {
        return $country;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Countries $country)
    {
        return view('admin/countries/edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countries $country)
    {
        $request->validate([
            'name' => 'required',
            'countrycode' => 'required',
            'status' => ['required', new Enum(Status::class)],

        ]);

        $country->name = $request->name;
        $country->countrycode = $request->countrycode;
        $country->status = $request->status;
        $country->save();
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Countries $country)
    {
        $country->delete();        
        return redirect()->route('countries.index');
    }
}
