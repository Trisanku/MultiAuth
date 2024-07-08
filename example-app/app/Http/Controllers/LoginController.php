<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //this method will show login page
    public function index(){
        return view('login');
    }


    //this method will authenticate user
    public function authenticate(Request $request)
    {
    
         //this method will authenticate user
        $validator=validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

       // This code I got from laravel Documentation Part
       // // /* $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('/account/dashboard');
        // }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
        // */


       

    // Code that I got from Laravel youtube channel(Video: Laravel Authenticating User )
       // // /* $validator=validator::make($request->all(),[
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ])->validate();

        
        // if(auth()->attempt(request()->only(['email', 'password']))) {
        //     return redirect('/account/dashboard');
        // }
        
        // return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
        // */

        if($validator->passes()){

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            //     // return redirect('account.dashboard');
                 return Redirect('account.dashboard');
            }
            else{
                return Redirect()->route('account.login')->with('error','Either email or password is incorrect');
            }    
        }else{
            return redirect()->route('account.login')
             ->withInput()
             ->withErrors($validator);
        }
    }

    //This method will show register page
    public function register(Request $request) {
        return view('register');
    }

    public function processRegister(Request $request){
        $validator=validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validator->passes()){
            $user =new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
          
            return redirect()->route('account.login')->with('success','You have registered Successfully');
        }else{
            return redirect()->route('account.register')
             ->withInput()
             ->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
