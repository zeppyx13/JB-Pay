<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Exception;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login');
    }
    public function auth(Request $request)
    {
        try {
            // Validasi input dari form login
            $credentials = $request->validate([
                'Email' => ['required', 'email:dns'],
                'password' => ['required'],
            ]);

            // Cek apakah percobaan login berhasil
            if (Auth::attempt($credentials)) {
                // Regenerasi session setelah login
                $request->session()->regenerate();

                // Dapatkan informasi user yang sedang login
                $user = Auth::user();

                // Jika user adalah admin, arahkan ke halaman admin
                if ($user->Role == 'Admin') {
                    return redirect()->intended('/Admin');
                } else {
                    // Jika user bukan admin, arahkan ke halaman dashboard
                    return redirect()->intended('/dashboard');
                }
            }

            // Jika login gagal (email atau password salah)
            throw new Exception("Login error: please check your email or password.");
        } catch (Exception $e) {
            // Kembalikan ke halaman sebelumnya dengan pesan error generik
            return redirect()->back()->with('error', $e->getMessage());
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
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
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
