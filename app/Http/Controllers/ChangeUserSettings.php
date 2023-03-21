<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangeUserSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth/reset");
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function update_password(Request $request, string $id)
    {


        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with("password-status", "Password changed successfully!");

    }

    public function update_email(Request $request, string $id)
    {

        User::whereId(Auth::user()->id)->update([
            'email' => $request->new_email,
        ]);

        return back()->with("email-status", "E-Mail changed successfully!");

    }
}

