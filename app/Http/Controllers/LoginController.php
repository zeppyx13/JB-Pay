<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\signin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Login');
    }
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->Role == 'Admin') {
                return redirect()->intended('/Admin');
            } else {
                return redirect()->intended('/dashboard');
            }
        }
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            // Jika tidak ada pengguna dengan email yang dimasukkan, kembalikan pesan kesalahan yang sesuai
            return back()->with('error', "Email doesn't exist.");
        } else {
            // Jika email terdaftar tetapi kata sandi salah, kembalikan pesan kesalahan yang sesuai
            return back()->with('error', 'Password wrong.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(signin $signin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(signin $signin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, signin $signin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
