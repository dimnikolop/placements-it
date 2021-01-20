<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('main.home');
    }

    public function requirements() {
        return view('main.requirements');
    }

    public function guides() {
        return view('main.guides');
    }

    public function documents() {
        return view('main.documents');
    }

    public function legislation() {
        return view('main.legislation');
    }
}
