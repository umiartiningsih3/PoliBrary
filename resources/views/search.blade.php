@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">
        Hasil Pencarian
    </h1>

    <p>
        Kata kunci:
        <strong>{{ request('q') }}</strong>
    </p>
</div>
@endsection