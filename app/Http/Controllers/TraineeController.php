<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Display a listing of all trainees students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'am' => 'required|digits_between:5,7|unique:trainees',
            'phone' => 'required_without:email',
            'email' => 'required|email|unique:trainees',
            'semester' => 'required',
            'year_from' => 'required|date_format:"Y"|after:2010|before:2050',
            'year_to' => 'required|date_format:"Y"|after:year_from|before:2050',
            'supervisor' => 'required',
            'company' => 'required',
            'job' => 'required'
        ]);

        $validatedData['season'] = $validatedData['year_from'] . ' - ' . $validatedData['year_to'];

        Trainee::create($validatedData);

        return redirect()->route('trainees.index')->with('success', 'H εισαγωγή του νέου ασκούμενου ολοκληρώθηκε επιτυχώς.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainee)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainee $trainee)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        //
    }
}
