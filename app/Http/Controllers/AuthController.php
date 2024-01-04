<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function homeView()
    {
        return view('home');
    }

    public function userView()
    {
        return view(route('my'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $request->session()->regenerate();

        return redirect(route('home'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->with(['email' => 'не найден']);
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/' );
    }

}
