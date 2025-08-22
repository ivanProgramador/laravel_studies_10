<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login():RedirectResponse
    {
       $user = User::find(1);
       Auth::login($user);
       return redirect()->route('home');
    }

    
    public function logout():RedirectResponse
    {
       $user = User::find(1);
       Auth::logout();
       return redirect()->route('home');
    }

       
}
