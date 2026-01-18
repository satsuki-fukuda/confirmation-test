<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Contact; 

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function confirm(LoginRequest $request)
    {
        $contact = $request->only(['email', 'password']);
        return view('confirm', ['contact' => $contact]);
    }

    public function store(LoginRequest $request)
    {
        $contact = $request->validated();
        Contact::create($contact);
        return redirect('admin');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return back()->withErrors([
            'email' => 'ログイン情報が登録されていません。',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
