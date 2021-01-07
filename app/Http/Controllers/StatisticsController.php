<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentQuestionnaire;
use App\Models\GraduateQuestionnaire;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function indexStudent()
    {
        $question4 = StudentQuestionnaire::select(DB::raw('question4, COUNT(*) as count_answers'))->groupBy('question4')->get();
        $labels = $question4->pluck('question4');
        $data = $question4->pluck('count_answers');
        $question4 = compact('labels','data');

        $question10 = StudentQuestionnaire::select(DB::raw('question10, COUNT(*) as count_answers'))->groupBy('question10')->get();
        $labels = $question10->pluck('question10');
        $data = $question10->pluck('count_answers');
        $question10 = compact('labels','data');

        $question12 = StudentQuestionnaire::select(DB::raw('question12, COUNT(*) as count_answers'))->groupBy('question12')->get();
        $labels = $question12->pluck('question12');
        $data = $question12->pluck('count_answers');
        $question12 = compact('labels','data');

        $question15 = StudentQuestionnaire::select(DB::raw('question15, COUNT(*) as count_answers'))->groupBy('question15')->get();
        $labels = $question15->pluck('question15');
        $data = $question15->pluck('count_answers');
        $question15 = compact('labels','data');

        $question21 = StudentQuestionnaire::select('question21')->get();
        foreach ($question21 as $key => $value) {
            $question21[$key] = explode(',', $value->question21);
        }
        $question21 = $question21->collapse()->countBy();
        $labels = $data = [];
        foreach ($question21 as $key => $value) {
            $labels[] = $key;
            $data[] = $value;
        }
        $question21 = compact('labels','data');

        $question25 = StudentQuestionnaire::select(DB::raw('question25, COUNT(*) as count_answers'))->groupBy('question25')->get();
        $labels = $question25->pluck('question25');
        $data = $question25->pluck('count_answers');
        $question25 = compact('labels','data');

        $question26 = StudentQuestionnaire::select(DB::raw('question26, COUNT(*) as count_answers'))->groupBy('question26')->get();
        $labels = $question26->pluck('question26');
        $data = $question26->pluck('count_answers');
        $question26 = compact('labels','data');

        $chart_data = compact('question4', 'question10', 'question12', 'question15', 'question21', 'question25', 'question26');
        
        return view('statistics.student', ['chart_data' => $chart_data]);
    }

    public function indexGraduate()
    {
        $question2 = GraduateQuestionnaire::select('question2')->get();
        foreach ($question2 as $key => $value) {
            $question2[$key] = explode(',', $value->question2);
        }
        $question2 = $question2->collapse()->countBy();
        $labels = $data = [];
        foreach ($question2 as $key => $value) {
            $labels[] = $key;
            $data[] = $value;
        }
        $question2 = compact('labels','data');

        $question5 = GraduateQuestionnaire::select(DB::raw('question5, COUNT(*) as count_answers'))->groupBy('question5')->get();
        $labels = $question5->pluck('question5');
        $data = $question5->pluck('count_answers');
        $question5 = compact('labels','data');

        $question7 = GraduateQuestionnaire::select(DB::raw('question7, COUNT(*) as count_answers'))->groupBy('question7')->get();
        $labels = $question7->pluck('question7');
        $data = $question7->pluck('count_answers');
        $question7 = compact('labels','data');

        $question11 = GraduateQuestionnaire::select(DB::raw('question11, COUNT(*) as count_answers'))->groupBy('question11')->get();
        $labels = $question11->pluck('question11');
        $data = $question11->pluck('count_answers');
        $question11 = compact('labels','data');

        $question11a = GraduateQuestionnaire::select(DB::raw('question11a, COUNT(*) as count_answers'))->groupBy('question11a')->get();
        $labels = $question11a->pluck('question11a');
        $data = $question11a->pluck('count_answers');
        $question11a = compact('labels','data');

        $question12 = GraduateQuestionnaire::select(DB::raw('question12, COUNT(*) as count_answers'))->groupBy('question12')->get();
        $labels = $question12->pluck('question12');
        $data = $question12->pluck('count_answers');
        $question12 = compact('labels','data');

        $question24 = GraduateQuestionnaire::select(DB::raw('question24, COUNT(*) as count_answers'))->groupBy('question24')->get();
        $labels = $question24->pluck('question24');
        $data = $question24->pluck('count_answers');
        $question24 = compact('labels','data');

        $question25 = GraduateQuestionnaire::select('question25')->get();
        foreach ($question25 as $key => $value) {
            $question25[$key] = explode(',', $value->question25);
        }
        $question25 = $question25->collapse()->countBy();
        $labels = $data = [];
        foreach ($question25 as $key => $value) {
            $labels[] = $key;
            $data[] = $value;
        }
        $question25 = compact('labels','data');
        
        $chart_data = compact('question2', 'question5', 'question7', 'question11', 'question11a', 'question12', 'question24', 'question25');

        return view('statistics.graduate', ['chart_data' => $chart_data]);
    }
}
