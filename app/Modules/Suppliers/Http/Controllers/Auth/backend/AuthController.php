<?php

namespace Suppliers\Http\Controllers\Auth\backend;

use Admins\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login(LoginRequest $request){
        $data = $request->all();

        if(Auth::guard('supplier')-> attempt(['email' => $data['email'], 'password' => $data['password']])){
            toastr()->success('Logged in successfully!');
            return redirect()->route('Suppliers.frontend.dashboard');

        }else {
            toastr()->error('Invalid Email or Password.');
            return redirect()->back();
        }
    }

    // function to log out
    public function logout(){
        Auth::guard('supplier')->logout();
        return back();
    }
}
