<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\CompanyQuestionnaire;
use App\Models\TraineeQuestionnaire;
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
     * Show the form for creating a new trainee questionnaire.
     *
     * @return \Illuminate\Http\Response
     */
    public function traineeCreate()
    {
        return view('questionnaires.trainee');
    }

    /**
     * Store a newly created trainee questionnaire in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function traineeStore(Request $request)
    {
        
        // Validate the request...
        $validatedData = $request->validate([
            'company' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'semester' => 'required',
            'year_from' => 'required|date_format:"Y"|after:2010|before:2050',
            'year_to' => 'required|date_format:"Y"|after:year_from|before:2050',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'other4' => 'required_if:question4,Άλλο',
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
            'question8' => 'required',
            'question9' => 'required',
            'question10' => 'required',
            'question11' => 'required',
            'question12' => 'required',
            'question13' => 'required',
            'question14' => 'required',
            'question15' => 'required',
            'other15' => 'required_if:question15,Άλλο',
            'question16' => 'required',
            'question17' => 'required',
            'question18' => 'required',
            'question19' => 'required',
            'question20' => 'required',
            'question21' => 'required|array|between:1,5',
            'question23' => 'required',
            'question24' => 'required',
            'question25' => 'required',
            'question26' => 'required'
        ]);

        $validatedData['season'] = $validatedData['year_from'] . ' - ' . $validatedData['year_to'];

        $validatedData = Arr::except($validatedData, ['year_from', 'year_to']);
        
        $validatedData['question21'] = implode(',', $validatedData['question21']);

        if (!empty(array_filter($request->question22))) {
            $validatedData['question22'] = implode(',', $request->question22);
        }
        
        TraineeQuestionnaire::create($validatedData);

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
            'trainee' => 'required',
            'company' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'other3' => 'required_if:question3,Άλλο',
            'question4' => 'required',
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
            'question8' => 'required',
            'question9' => 'required',
            'question10' => 'required',
            'question11' => 'required',
            'question12' => 'required',
            'question13' => 'required'
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
            'trainee' => 'required',
            'am' => 'required|digits_between:5,7|unique:professor_questionnaires',
            'company' => 'required',
            'supervisor' => 'required',
            'start_date' => 'required|date_format:"d/m/Y"|after:01/01/2010|before:31/12/2049',
            'end_date' => 'required|date_format:"d/m/Y"|after:start_date|before:31/12/2049',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'question5' => 'required',
            'question6' => 'required',
            'question7' => 'required',
            'question8' => 'required',
            'question9' => 'required',
            'question10' => 'required',
            'question11' => 'required',
            'question12' => 'required'
        ]);

        ProfessorQuestionnaire::create($validatedData);

        return back()->with('success', 'Οι απαντήσεις του ερωτηματολόγιου καταχωρήθηκαν επιτυχώς.');
    }
}
