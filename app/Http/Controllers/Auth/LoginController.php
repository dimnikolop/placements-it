<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        //return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        // validate login form credentials
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        // attempt to log in
        if(auth()->attempt($request->only('username', 'password'), $request->remember)) {
            
            $request->session()->regenerate();

            // to admin dashboard
            if (auth()->user()->role == 'admin') {
                return response()->json(['success'=>'Admin is logged in!', 'url' => route('admin.dashboard')]);
            }
            else {
                return response()->json(['success'=>'Logged in!', 'url' => route('home')]);
            }
        }
        
        return response()->json(['error' => 'Password is incorrect']);
    }
}
