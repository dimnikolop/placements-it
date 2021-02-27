<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GraduateQuestionnaire;
use App\Http\Requests\StoreGraduateRequest;

class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduates = Graduate::orderBy('status')->get();
        return view('admin.graduates', compact('graduates'));
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
    public function store(StoreGraduateRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        
        // Array to store answers of the questionnaire
        $questionnaire = [];

        // Find the answers of the questionnaire from request and store them to questionnaire array
        foreach ($request->all() as $key => $value) {
            if (Str::contains($key, ['question', 'other'])) {
                $questionnaire[$key] = $value;
            }
        }
        
        $request->diploma = implode(', ', $request->diploma);

        DB::transaction(function () use ($request, $questionnaire)
        {
            // Get coordinates according to full address
            $addr = $request->work_address . " " . $request->city . " " . $request->postal_code;
            $output = Graduate::getCoordinates($addr);
            if ($output === false) {
                $output['lat'] = $output['lng'] = 0;
            }
            
            $graduate = Graduate::create([
                'surname' => $request->surname,
                'name' => $request->name,
                'father_name' => $request->father_name,
                'graduation_year' => $request->graduation_year,
                'diploma' => $request->diploma,
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
                'lat' => $output['lat'],
                'lng' => $output['lng']
            ]);
    
            if ($request->has('question2')) {
                $questionnaire['question2'] = implode(', ', $questionnaire['question2']);
            }
            if ($request->has('question8c')) {
                $questionnaire['question8c'] = implode(', ', $questionnaire['question8c']);
            }
            if ($request->has('question25')) {
                $questionnaire['question25'] = implode(', ', $questionnaire['question25']);
            }
            
            if (!empty(array_filter($questionnaire))) {
                $questionnaire['graduate_id'] = $graduate->id;
                GraduateQuestionnaire::create($questionnaire);
            }
        });

        return redirect()->route('graduates.create')->with('success', 'Η εγγραφή ολοκληρώθηκε επιτυχώς. Σας ευχαριστούμε για τον χρόνο που διαθέσατε!');
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
        $graduate = Graduate::find($id);
        $graduate->status = $request->status;
        $graduate->save();
            
        return back()->with('success', "Ο απόφοιτος " .$graduate->surname. " " .$graduate->name. " έγινε αποδεκτός στο σύστημα επιτυχώς!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graduate = Graduate::find($id);
        $graduate->delete();
        return back()->with('success', 'Graduate has been successfully deleted.');
    }

    /**
     * Display a listing of graduates on google map.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        $graduates = Graduate::where('map', 1)->where('status', 'approved')->get();
        return view('main.graduates_map', compact('graduates'));
    }
}
