<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //This method will show dashboard for general user

    // public function index(){
    //     return view('dashboard', [
    //     'user' => auth()->user()
    //     ]);
    // }

    public function index()
    {
    $users = Auth::user(); // Assuming you are fetching the logged-in user
    return view('dashboard', compact('users'));
    }

}
