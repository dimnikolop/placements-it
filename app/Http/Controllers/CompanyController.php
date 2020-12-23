<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of all companies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::get();

        return view('companies.index', [
            'companies' => $companies
        ]);
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
            'name' => 'required|unique:companies,name',
            'description' => 'required',
            'sector' => 'required',
            'address' => 'required',
            'zip_code' => 'required|max:8',
            'location' => 'required',
            'website' => 'url|max:45',
            'contact_person' => 'required|max:45',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:60|unique:companies',
            'logo' => 'image|mimes:jpg,bmp,png',
            'username' => 'required|max:30|unique:users',
            'password' => 'required|min:8|max:25|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'company',
        ]);

        $company = Company::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'description' => $request->description,
            'sector' => $request->sector,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'location' => $request->location,
            'website' => $request->website,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes
        ]);

        return redirect()->route('company_register')->with('success', 'Η εγγραφή ολοκληρώθηκε επιτυχώς. Σας ευχαριστούμε για τον χρόνο που διαθέσατε!');
    }

    /**
     * Display the specified company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'description' => 'required',
            'sector' => 'required',
            'address' => 'required',
            'zip_code' => 'required|max:8',
            'location' => 'required',
            'website' => 'nullable|url|max:45',
            'contact_person' => 'required|max:45',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:60|unique:companies',
            'logo' => 'image|mimes:jpg,bmp,png'
        ]);

        $company->update($validatedData);

        return redirect()->route('company.dashboard')->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
    }

    /**
     * Display the company dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $company = auth()->user()->company;

        return view('companies.dashboard', [
            'company' => $company
        ]);
    }
}
