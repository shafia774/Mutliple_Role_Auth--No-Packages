<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Countries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\ConstantStatus;
use Illuminate\Validation\Rules\Enum;

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
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'numeric', 'max:255', "exists:countries,id"],
            'status' => ['required', new Enum(ConstantStatus::class)],
        ]);
        if ($validator->passes()) {
            $states =State::create([
                'name' => $validator->safe()->name,
                'country_id' => $validator->safe()->country,
                'status' => $validator->safe()->status
            ]);
            return redirect()->route('states.index');   
        }else{
            return redirect()
                ->route('states.create')
                ->withErrors($validator)
                ->withInput();
        }
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
        $status = $state->status;
        return view('admin/states/edit', compact('state','countries','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'numeric', 'max:255', "exists:countries,id"],
            'status' => ['required', new Enum(ConstantStatus::class)],
        ]);
        if ($validator->passes()) {
            $state->name = $validator->safe()->name;
            $state->country_id = $validator->safe()->country;
            $state->status = $validator->safe()->status;
            $state->save();
            return redirect()->route('states.index');
        }else{
            return redirect()
                ->route('countries.edit' ,$state->id)
                ->withErrors($validator)
                ->withInput();
        }
        
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
