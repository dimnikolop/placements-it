<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\CompanyQuestionnaire;
use App\Models\StudentQuestionnaire;
use App\Models\ProfessorQuestionnaire;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questionnaires.index');
    }

    /**
     * Show the form for creating a new student questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentCreate()
    {
        return view('questionnaires.student');
    }

    /**
     * Store a newly created student questionnaire in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function studentStore(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'company' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'semester' => 'required',
            'year_from' => 'required|date_format:"Y"|after:2010|before:2050',
            'year_to' => 'required|date_format:"Y"|after:year_from|before:2050',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'other4' => 'required_if:answer4,Άλλο',
            'answer5' => 'required',
            'answer6' => 'required',
            'answer7' => 'required',
            'answer8' => 'required',
            'answer9' => 'required',
            'answer10' => 'required',
            'answer11' => 'required',
            'answer12' => 'required',
            'answer13' => 'required',
            'answer14' => 'required',
            'answer15' => 'required',
            'other15' => 'required_if:answer15,Άλλο',
            'answer16' => 'required',
            'answer17' => 'required',
            'answer18' => 'required',
            'answer19' => 'required',
            'answer20' => 'required',
            'answer21' => 'required|array|between:1,5',
            'answer23' => 'required',
            'answer24' => 'required',
            'answer25' => 'required',
            'answer26' => 'required'
        ]);

        $validatedData['season'] = $validatedData['year_from'] . ' &mdash; ' . $validatedData['year_to'];

        $validatedData = Arr::except($validatedData, ['year_from', 'year_to']);

        $validatedData['answer21'] = collect($validatedData['answer21'])->implode(',');

        if (!empty($request->answer22[0])) {
            $validatedData['answer22'] = collect($request->answer22)->implode(',');
        }
        
        StudentQuestionnaire::create($validatedData);

        return back()->with('success', 'Οι απαντήσεις του ερωτηματολόγιου καταχωρήθηκαν επιτυχώς.');
    }

    /**
     * Show the form for creating a new company questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyCreate()
    {
        return view('questionnaires.company');
    }

    /**
     * Store a newly created company questionnaire in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function companyStore(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'supervisor' => 'required',
            'student' => 'required',
            'company' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'other3' => 'required_if:answer3,Άλλο',
            'answer4' => 'required',
            'answer5' => 'required',
            'answer6' => 'required',
            'answer7' => 'required',
            'answer8' => 'required',
            'answer9' => 'required',
            'answer10' => 'required',
            'answer11' => 'required',
            'answer12' => 'required',
            'answer13' => 'required'
        ]);

        CompanyQuestionnaire::create($validatedData);

        return back()->with('success', 'Οι απαντήσεις του ερωτηματολόγιου καταχωρήθηκαν επιτυχώς.');
    }

    /**
     * Show the form for creating a new professor questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function professorCreate()
    {
        return view('questionnaires.professor');
    }

    /**
     * Store a newly created professor questionnaire in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function professorStore(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'student' => 'required',
            'am' => 'required|digits_between:6,7|unique:professor_questionnaires',
            'company' => 'required',
            'supervisor' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'answer6' => 'required',
            'answer7' => 'required',
            'answer8' => 'required',
            'answer9' => 'required',
            'answer10' => 'required',
            'answer11' => 'required',
            'answer12' => 'required'
        ]);

        ProfessorQuestionnaire::create($validatedData);

        return back()->with('success', 'Οι απαντήσεις του ερωτηματολόγιου καταχωρήθηκαν επιτυχώς.');
    }
}
