<?php

namespace Suppliers\Http\Controllers\Auth\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // function to redirect to log in view
    public function Login(){

        $MainTitle = 'Sign in as Supplier';
        return view(buildView('Suppliers', 'Auth', 'login'),compact('MainTitle'));
    }

    public function home(){

        return view(buildView('Suppliers', 'Dashboard', 'index'));
    }
}
