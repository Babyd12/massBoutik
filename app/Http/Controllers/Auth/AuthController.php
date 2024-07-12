<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;
use Illuminate\Contracts\View\View;

class AuthController extends Controller
{
    /**
     * generate comment for this function
     * 
     * 
     * @return view
     */



    public function login():View
    {
        return view('auth.login');
    }
    /**
     * Handles user authentication.
     *
     * @param  \App\Http\Requests\AuthRequest  $request  The validated authentication request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */

    public function authUser(AuthRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            // User authenticated successfully, redirect to dashboard
            return redirect()->intended('dashboard');
        } else {
            // Authentication failed, redirect back with error message
            return back()->with('error', trans('auth.failed'));
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
