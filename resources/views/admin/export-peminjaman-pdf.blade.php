<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku Dipinjam</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th {
            background: #eeeeee;
            padding: 8px;
            text-align: center;
        }

        td {
            padding: 8px;
        }

        .center {
            text-align: center;
        }

    </style>

</head>

<body>


<h2>
    Daftar Buku Dipinjam
</h2>


<table>

<thead>

<tr>

<th>No</th>

<th>Mahasiswa</th>

<th>NIM</th>

<th>Buku</th>

<th>Tanggal Pinjam</th>

<th>Jatuh Tempo</th>

<th>Status</th>

<th>Denda</th>

</tr>

</thead>


<tbody>


@foreach($peminjaman as $index => $item)


@php

$jatuhTempo = \Carbon\Carbon::parse(
$item->tgl_jatuh_tempo
);

$hariIni = \Carbon\Carbon::now();


$terlambat = $hariIni->greaterThan($jatuhTempo)
?
$hariIni->diffInDays($jatuhTempo)
:
0;


$denda = $terlambat * 2000;

@endphp


<tr>


<td class="center">
{{ $index + 1 }}
</td>


<td>
{{ $item->mahasiswa->name }}
</td>


<td>
{{ $item->mahasiswa->nim }}
</td>


<td>
{{ $item->buku->judul }}
</td>


<td class="center">
{{ $item->created_at->format('d-m-Y') }}
</td>


<td class="center">
{{ \Carbon\Carbon::parse($item->tgl_jatuh_tempo)->format('d-m-Y') }}
</td>


<td class="center">
{{ $item->status }}
</td>


<td class="center">

@if($denda > 0)

Rp {{ number_format($denda,0,',','.') }}

@else

Tidak Ada

@endif

</td>


</tr>


@endforeach


</tbody>


</table>


</body>
</html>