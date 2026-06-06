<?php

namespace App\Http\Controllers;
use App\Models\Denda;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DendaExport;

class DendaController extends Controller
{
    public function index()
    {
        return view('peminjaman.denda');
    }
    public function riwayat()
{
    // Ganti ->get() menjadi ->paginate(10)
$riwayatDenda = Denda::with(['user', 'buku'])->latest()->paginate(10);
    return view('denda.riwayat-denda', compact('riwayatDenda'));
}

public function export()
{
    // Menggunakan package Maatwebsite/Excel
    return Excel::download(new DendaExport, 'Laporan_Riwayat_Denda_'.date('Y-m-d').'.xlsx');
}
}