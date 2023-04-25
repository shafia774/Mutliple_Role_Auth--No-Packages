<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\ConstantStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::orderBy('name')->paginate(10);
        return view('admin/vendors/index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/vendors/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            // 'wallet' => ['required', 'integer', 'max:255'],
            'status' =>  ['required', new Enum(ConstantStatus::class)],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'mobile' => ['required', 'string', 'min:10', 'max:13'],
        ]);
        if ($validator->passes()) {
            $user=User::create([
                'name' => $validator->safe()->name,
                'email' => $validator->safe()->email,
                'mobile' => $validator->safe()->mobile,
                'role' => 1,
                'status' => $validator->safe()->status,
                'password' => Hash::make($validator->safe()->password),
            ]);
            $vendors =Vendor::create([
                'name' => $validator->safe()->name,
                'status' => $validator->safe()->status,
                'user_id' => $user->id
            ]);
            return redirect()->route('vendors.index');
        }else{
            return redirect()
                ->route('vendors.create')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return $vendor;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        $status = $vendor->status;
        $user =  User::find($vendor->user_id);
        return view('admin/vendors/edit', compact('vendor','status','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        if($request->password != ''){
            $validator = Validator::make($request->all(),[
                'name' => ['required', 'string', 'max:255'],
                'status' =>  ['required', new Enum(ConstantStatus::class)],
                'email' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'mobile' => ['required', 'string', 'min:10', 'max:13'],
            ]);
        }else{
            $validator = Validator::make($request->all(),[
                'name' => ['required', 'string', 'max:255'],
                'status' =>  ['required', new Enum(ConstantStatus::class)],
                'email' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'string', 'min:10', 'max:13'],
            ]);
        }
        if ($validator->passes()) {
            $vendor->name = $validator->safe()->name;
            $vendor->status = $validator->safe()->status;
            $vendor->save();
            $user = User::find($vendor->user_id);
            $user->name = $validator->safe()->name;
            $user->email = $validator->safe()->email;
            $user->mobile = $validator->safe()->mobile;
            $user->role = 1;
            $user->status = $validator->safe()->status;
            if($request->password != ''){
                $user->password = Hash::make($validator->safe()->password);
            }
            $user->save();
            return redirect()->route('vendors.index');
        }else{
            return redirect()
                ->route('vendors.edit' ,$vendor->id)
                ->withErrors($validator)
                ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();        
        return redirect()->route('vendors.index');
    }
}
