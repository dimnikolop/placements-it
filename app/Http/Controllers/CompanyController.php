<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Show the register form for the company.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.company_register');
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'company_name' => 'required|unique:companies,name',
            'description' => 'required',
            'category' => 'required',
            'address' => 'required',
            'location' => 'required',
            'website' => 'max:45',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:60|unique:companies',
            'username' => 'required|max:30|unique:users',
            'password' => 'required|min:8|max:25|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'company',
        ]);

        $company = Company::create([
            'name' => $request->company_name,
            'user_id' => $user->id,
            'description' => $request->description,
            'category' => $request->category,
            'address' => $request->address,
            'location' => $request->location,
            'website' => $request->website,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes
        ]);

        return redirect()->route('company_register')->with('success', 'Η εγγραφή ολοκληρώθηκε επιτυχώς. Σας ευχαριστούμε για τον χρόνο που διαθέσατε!');
    }
}
