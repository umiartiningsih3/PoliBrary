<?php

namespace App\Http\Controllers;
use App\Models\Denda;

use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        return view('peminjaman.denda');
    }
    public function riwayat()
{
    $riwayatDenda = Denda::with(['user', 'buku'])->latest()->get();
    return view('denda.riwayat-denda', compact('riwayatDenda'));
}

public function export()
{
    // Menggunakan package Maatwebsite/Excel
    return Excel::download(new DendaExport, 'Laporan_Riwayat_Denda_'.date('Y-m-d').'.xlsx');
}
}