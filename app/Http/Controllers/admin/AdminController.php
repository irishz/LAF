<?php

namespace App\Http\Controllers\admin;

use App\Form;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // $manager_dept = Auth::user()->department;

        // $results = Form::user()->user_id;

        return view('admin/dashboard');
    }

}
