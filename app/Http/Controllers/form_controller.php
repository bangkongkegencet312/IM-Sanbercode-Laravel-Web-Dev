<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import Model User
use Illuminate\Support\Facades\Hash; // Import untuk enkripsi password

class form_controller extends Controller
{
    public function daftar (){
        return view('login');

    }
    public function welcome(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:3',
        ]);

        // 2. Simpan User Baru ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password demi keamanan
            'role' => 'user', // Set default role menjadi 'user' sesuai permintaanmu
        ]);

        // 3. Redirect ke halaman login dengan pesan sukses
        return redirect('/')->with('success', 'Registrasi berhasil! Silakan Sign In.');
    }
    
    //
}
