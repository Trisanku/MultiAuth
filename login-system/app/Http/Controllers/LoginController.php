<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\facades\Validator;

class LoginController extends Controller
{
    //// this method will show login page for customer
    public function index() {
        return view('login');
    }
    //this method will authenticate user
    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',

        ]);
        if($validator->passes()) {


        }else{
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }
}

