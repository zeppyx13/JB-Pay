<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreregisterRequest;
use Illuminate\Validation\ValidationException;
use Exception;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'Name' => 'required|min:3|max:35',
                'UserName' => 'required|min:5|max:15|unique:users',
                'Email' => 'required|email:dns|unique:users',
                'password' => 'required|min:8|max:255',
                'pw2' => 'required|same:password',
            ]);

            // Hash password before storing
            $validatedData['password'] = Hash::make($validatedData['password']);
            unset($validatedData['pw2']);

            // Create user
            User::create($validatedData);

            return redirect('/')->with('success', 'Registration Successful');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }
}
