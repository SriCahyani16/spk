<?php

namespace App\Http\Controllers;

use App\Models\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanitiaController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $panitia = Panitia::create($validatedData);

        // Lakukan sesuatu, seperti mengirim email verifikasi, dll.

        return redirect()->back()->with('success', 'User created successfully.');
    }

}
