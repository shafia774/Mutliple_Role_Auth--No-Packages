<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::orderBy('name')->paginate(10);
        return view('admin/states/index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Countries::orderBy('name')->get();
        return view('admin/states/create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'status' => 'required',
        ]);

        $states =state::create([
            'name' => $request->name,
            'country_id' => $request->country,
            'status' => $request->status
        ]);
        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return $state;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Countries::orderBy('name')->get();
        return view('admin/states/edit', compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
            'status' => 'required',
        ]);
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->status = $request->status;
        $state->save();
        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();        
        return redirect()->route('states.index');
    }
}
