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
        if (auth()->check() && auth()->user()->role === 'admin') {
            $companies = Company::all();
            return view('admin.companies', [
                'companies' => $companies
            ]);
        }
        else {
            $companies = Company::where('status', 'approved')->get();
            return view('companies.index', [
                'companies' => $companies
            ]);
        }
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
            'zip_code' => 'required',
            'location' => 'required',
            'website' => 'nullable|url',
            'contact_person' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'nullable|image',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|max:20|confirmed'
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

        return redirect()->route('company.register')->with('success', 'Η εγγραφή ολοκληρώθηκε επιτυχώς. Σας ευχαριστούμε για τον χρόνο που διαθέσατε!');
    }

    /**
     * Display the specified company.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $jobs = $company->jobs;
        return view('companies.show', compact('company', 'jobs'));
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
        if ($request->has('status')) {
            $company->status = $request->status;
            $company->save();
            
            return back()->with('success', "Ο φορέας απασχόλησης " .$company->name. " έγινε αποδεκτός στο σύστημα επιτυχώς!");
        }
        else {
            // Validate the request...
            $validatedData = $request->validateWithBag('company', [
                'description' => 'required',
                'sector' => 'required',
                'address' => 'required',
                'zip_code' => 'required',
                'location' => 'required',
                'website' => 'nullable|url',
                'contact_person' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:companies',
                'logo' => 'image'
            ]);
            
            $company->update($validatedData);

            return redirect()->route('company.dashboard')->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
        }
        
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
        return back()->with('success', 'Company ' .$company->name. ' has been deleted successfully.');
    }

    /**
     * Display the company dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $company = auth()->user()->company;
        $jobs = $company->jobs;

        return view('companies.dashboard', [
            'company' => $company,
            'jobs' => $jobs
        ]);
    }
}
