<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()) {
            return view('admin/dashboard');
        } else {
            return view('home');
        }
    }

    public function show(){
        $user_id = Auth::user()->user_id;

        $forms = User::find($user_id)->forms;
        dd($forms);
        return view('home',compact('forms'));
    }
}
