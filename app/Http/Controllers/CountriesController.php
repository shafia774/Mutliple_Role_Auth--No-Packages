<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\ConstantStatus;
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
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'countrycode' => ['required', 'numeric', 'max:255'],
            'status' => ['required', new Enum(ConstantStatus::class)],
        ]);
        if ($validator->passes()) {
            $countries =Countries::create([
                'name' => $validator->safe()->name,
                'countrycode' => $validator->safe()->countrycode,
                'status' => $validator->safe()->status
            ]);
            return redirect()->route('countries.index');   
        }else{
            return redirect()
                ->route('countries.create')
                ->withErrors($validator)
                ->withInput();
        }
        
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
        $status = $country->status;
        return view('admin/countries/edit', compact('country','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countries $country)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'countrycode' => ['required', 'numeric', 'max:255'],
            'status' => ['required', new Enum(ConstantStatus::class)],
        ]);
        if ($validator->passes()) {
            $country->name = $validator->safe()->name;
            $country->countrycode = $validator->safe()->countrycode;
            $country->status = $validator->safe()->status;
            $country->save();
            return redirect()->route('countries.index');
        }else{
            return redirect()
                ->route('countries.edit', $country->id)
                ->withErrors($validator)
                ->withInput();
        }
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
