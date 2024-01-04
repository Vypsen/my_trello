<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function homeView()
    {
        $projects = Auth::user()->projects;

        return view('home', ['user' => Auth::user(), 'projects' => $projects]);
    }
}
