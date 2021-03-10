<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ 
    /**
     * Display the application admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('dashboards.admin');
    }

    /**
     * Display the application user-company dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function company()
    {
        $company = auth()->user()->company;
        $jobs = $company->jobs;

        return view('dashboards.company', [
            'company' => $company,
            'jobs' => $jobs
        ]);
    }
}
