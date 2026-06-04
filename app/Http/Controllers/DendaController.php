<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        return view('peminjaman.denda');
    }
}