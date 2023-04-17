<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\State;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::orderBy('name')->paginate(10);
        return view('admin/districts/index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Countries::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        return view('admin/districts/create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'status' => 'required',
        ]);

        $districts =District::create([
            'name' => $request->name,
            'state' => $request->state,
            'status' => $request->status
        ]);
        return redirect()->route('districts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return $district;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return view('admin/districts/edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required',
            'state' => 'required',
            'status' => 'required',
        ]);
        $district->name = $request->name;
        $district->state = $request->state;
        $district->status = $request->status;
        $district->save();
        return redirect()->route('districts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();        
        return redirect()->route('districts.index');
    }
}
