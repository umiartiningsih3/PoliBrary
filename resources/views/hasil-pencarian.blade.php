@extends('layouts.app') 

@section('content')
<div class="p-10">
    <h1 class="text-xl font-bold mb-4">Hasil pencarian untuk: "{{ $query }}"</h1>

    @if(count($hasilBuku) > 0)
        <ul class="space-y-2">
            @foreach($hasilBuku as $buku)
                <li class="p-4 bg-white shadow rounded">{{ $buku['judul'] }} - {{ $buku['penulis'] }}</li>
            @endforeach
        </ul>
    @else
        <p>Buku tidak ditemukan.</p>
    @endif
</div>
@endsection