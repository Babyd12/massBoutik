<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
       if(auth()->attempt($request->validated())){
            return redirect()->intended('dashboard');
            
       } else {
            return back()->with('error', trans('auth.failed'));
       }      

    }
}
