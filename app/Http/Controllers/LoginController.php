<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
{
    return view('login'); // Hapus 'auth.' jika file ada di resources/views/login.blade.php
}
}