<?php

namespace App\Http\Controllers;

use App\Models\signin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Login');
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
    public function destroy(signin $signin)
    {
        //
    }
}
