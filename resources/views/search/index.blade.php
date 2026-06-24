@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">
        Hasil Pencarian: "{{ $keyword }}"
    </h1>

    <div class="bg-white p-4 rounded shadow">

        <h2 class="font-bold text-lg mb-2">
            Buku ({{ $buku->count() }})
        </h2>

        @forelse($buku as $item)
            <div class="border-b py-2">
                {{ $item->judul }}
            </div>
        @empty
            <p>Tidak ada buku ditemukan.</p>
        @endforelse

    </div>

</div>
@endsection