<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homeView()
    {
        $projects = Auth::user()->projects;

        return view('home', ['user' => Auth::user(), 'projects' => $projects]);
    }
}
