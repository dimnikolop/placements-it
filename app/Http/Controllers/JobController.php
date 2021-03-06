<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of all jobs.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        return view('jobs.index', ['jobs' => $company->jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        $request->validateWithBag('job', [
            'title' => 'required',
            'description' => 'required',
            'requirements' => 'required'
        ]);
        
        Job::create([
            'company_id' => $company->id,
            'title' => $request->title,
            'description' => $request->description,
            'requirements' => $request->requirements
        ]);

        return redirect()->route('companies.dashboard', auth()->user()->username)->with('success', 'H νέα θέση απασχόλησης δημιουργήθηκε επιτυχώς.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Job $job)
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        return view('main.show_job', compact('company', 'job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, Job $job)
    {
        $validatedData = $request->validateWithBag('edit_job', [
            'title' => 'required',
            'description' => 'required',
            'requirements' => 'required'
        ]);

        $job->update($validatedData);

        return redirect()->route('companies.dashboard', auth()->user()->username)->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Job $job)
    {
        $job->delete();
        return redirect()->route('companies.dashboard', auth()->user()->username)->with('success', 'H θέση απασχόλησης με τίτλο ' .$job->title. ' διαγράφηκε επιτυχώς.');
    }
}
