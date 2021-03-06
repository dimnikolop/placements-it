<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of all trainees students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainees = Trainee::all();
        return view('trainees.index', compact('trainees'));
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

        return redirect()->route('trainees.index')->with('success', 'Η εισαγωγή του ασκούμενου φοιτητή ολοκληρώθηκε επιτυχώς.');
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
        $trainee['year_from'] = Str::before($trainee->season, '-');
        $trainee['year_to'] = Str::after($trainee->season, '-');
        
        $trainee['year_from'] = Str::of($trainee['year_from'])->rtrim();
        $trainee['year_to'] = Str::of($trainee['year_to'])->ltrim();

        return view('trainees.edit', compact('trainee'));
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
        // Validate the request...
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'am' => 'required|digits_between:5,7|unique:trainees,am,'.$trainee->id,
            'phone' => 'required_without:email',
            'email' => 'required|email|unique:trainees,email,'.$trainee->id,
            'semester' => 'required',
            'year_from' => 'required|date_format:"Y"|after:2010|before:2050',
            'year_to' => 'required|date_format:"Y"|after:year_from|before:2050',
            'supervisor' => 'required',
            'company' => 'required',
            'job' => 'required'
        ]);

        $validatedData['season'] = $validatedData['year_from'] . ' - ' . $validatedData['year_to'];
        
        $trainee->update($validatedData);

        return redirect()->route('trainees.index')->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        $trainee->delete();
        return back()->with('success', 'Ο ασκούμενος φοιτητής διαγράφηκε επιτυχώς.');
    }
}
