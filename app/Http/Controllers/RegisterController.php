<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        // Sesuaikan dengan lokasi file register.blade.php Anda
        return view('register'); 
    }
}