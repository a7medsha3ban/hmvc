<?php

namespace Admins\Http\Controllers\Auth\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // function to redirect to log in view
    public function Login(){

        $MainTitle = 'Sign in as Admin';
        return view(buildView('Admins', 'Auth', 'login'),compact('MainTitle'));
    }

    public function home(){

        return view(buildView('Admins', 'Dashboard', 'index'));
    }
}
