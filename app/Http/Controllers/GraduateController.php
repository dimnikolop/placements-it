<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GraduateQuestionnaire;

class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new graduate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.graduate_register');
    }

    /**
     * Store a newly created graduate and his questionnaire in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'graduation_year' => 'required|date_format:"Y"|after:1989|before:2050',
            'diploma' => 'required',
            'phone' => 'required_without:email',
            'email' => 'required|email|unique:graduates',
            'website' => 'nullable|url',
            'job' => 'required',
            'employer' => 'required',
            'work_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'answer1' => 'nullable|digits_between:1,2',
            'answer4' => 'nullable|digits_between:1,2',
            'other7' => 'required_if:answer7,Άλλο',
            'answer8a' => 'required_if:answer8,Ναι',
            'other8a' => 'required_if:answer8a,Άλλο',
            'answer8b' => 'required_if:answer8,Ναι',
            'other8b' => 'required_if:answer8b,Άλλο',
            'answer8c' => 'required_if:answer8,Ναι',
            'answer25' => 'array|between:1,5'
        ]);
        
        // Array to store answers of the questionnaire
        $questionnaire = [];

        // Find the answers of the questionnaire from request and store them to questionnaire array
        foreach ($request->all() as $key => $value) {
            if (Str::contains($key, ['answer', 'other'])) {
                $questionnaire[$key] = $value;
            }
        }

        
        $diploma = collect($request->diploma)->implode(',');
        
        $graduate = Graduate::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'graduation_year' => $request->graduation_year,
            'diploma' => $diploma,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'job' => $request->job,
            'employer' => $request->employer,
            'work_address' => $request->work_address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'notes' => $request->notes,
            'map' => $request->input('map', '0'),
            'latitude' => $request->input('latitude', '1'),
            'longitude' => $request->input('longitude', '1')
        ]);

        if ($request->has('answer2')) {
            $questionnaire['answer2'] = collect($questionnaire['answer2'])->implode(',');
        }
        if ($request->has('answer8c')) {
            $questionnaire['answer8c'] = collect($questionnaire['answer8c'])->implode(',');
        }
        if ($request->has('answer25')) {
            $questionnaire['answer25'] = collect($questionnaire['answer25'])->implode(',');
        }

        $questionnaire['graduate_id'] = $graduate->id;

        GraduateQuestionnaire::create($questionnaire);

        return redirect()->route('graduate.register')->with('success', 'Η εγγραφή ολοκληρώθηκε επιτυχώς. Σας ευχαριστούμε για τον χρόνο που διαθέσατε!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
