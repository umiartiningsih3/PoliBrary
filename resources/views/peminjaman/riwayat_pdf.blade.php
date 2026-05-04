<!DOCTYPE html>
<html>
<head>
    <title>Laporan Riwayat Peminjaman</title>
    <!-- Memuat Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            font-size: 11px; 
            color: #334155; 
            line-height: 1.6; 
            margin: 0;
            padding: 0;
        }
        
        .title { 
            text-align: center; 
            color: #475569; 
            font-size: 18px; 
            font-weight: 700; 
            text-transform: uppercase; 
            margin-bottom: 8px; 
            margin-top: 20px;
        }
        .line-bold { 
            border-bottom: 2px solid #475569; 
            margin-bottom: 25px; 
            width: 100%;
        }
        
        .info-table { 
            width: 100%; 
            margin-bottom: 20px; 
            border: none;
        }
        .info-table td { 
            padding: 4px 0; 
            vertical-align: top; 
            border: none;
        }
        .info-label { 
            width: 130px; 
            font-weight: 600; 
            color: #475569; 
        }
        .info-separator { 
            width: 15px; 
            color: #475569;
        }
        
        .section-title { 
            font-size: 14px; 
            font-weight: 600; 
            color: #475569; 
            margin-top: 20px; 
            margin-bottom: 6px; 
        }
        .line-dashed { 
            border-bottom: 1px dashed #cbd5e1; 
            margin-bottom: 15px; 
        }
        
        table.riwayat { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }
        table.riwayat th { 
            background-color: #f1f5f9; 
            color: #475569; 
            padding: 12px 10px; 
            text-align: left; 
            font-size: 10px; 
            border: 1px solid #e2e8f0; 
            text-transform: uppercase;
            font-weight: 700;
        }
        table.riwayat td { 
            padding: 10px; 
            border: 1px solid #e2e8f0; 
            vertical-align: middle; 
            color: #1e293b;
        }
        .text-center { text-align: center; }
        .font-bold { font-weight: 600; }
        
        .signature-wrapper {
            margin-top: 40px;
            width: 100%;
        }
        .signature { 
            float: right;
            text-align: center; 
            width: 200px;
        }
        .footer-note { 
            margin-top: 100px; 
            text-align: left; 
            font-size: 9px; 
            color: #94a3b8; 
            clear: both;
        }
    </style>
</head>
<body>

    <div class="title">LAPORAN RIWAYAT PEMINJAMAN BUKU</div>
    <div class="line-bold"></div>

    <table class="info-table">
        <tr>
            <td class="info-label">Nama Mahasiswa</td>
            <td class="info-separator">:</td>
            <td>Umiarti Ningsih</td>
        </tr>
        <tr>
            <!-- Menambahkan baris NIM -->
            <td class="info-label">NIM</td>
            <td class="info-separator">:</td>
            <td>3312511068</td>
        </tr>
        <tr>
            <td class="info-label">Instansi</td>
            <td class="info-separator">:</td>
            <td>Politeknik Negeri Batam</td>
        </tr>
        <tr>
            <td class="info-label">Program Studi</td>
            <td class="info-separator">:</td>
            <td>D3 Teknik Informatika</td>
        </tr>
    </table>

    <div class="section-title">Detail Riwayat Peminjaman:</div>
    <div class="line-dashed"></div>
    
    <table class="riwayat">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="35%">Judul Buku</th>
                <th width="20%">Tgl Pinjam</th>
                <th width="20%">Tgl Kembali</th>
                <th width="10%">Status</th>
                <th width="10%">Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="font-bold">{{ $item['judul'] }}</td>
                <td>{{ $item['tgl_pinjam'] }}</td>
                <td>{{ $item['tgl_kembali'] }}</td>
                <td>{{ $item['status'] }}</td>
                <td class="font-bold">Rp {{ number_format($item['denda'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature-wrapper">
        <div class="signature">
            <p>Batam, {{ date('d F Y') }}</p>
            <br><br><br>
            <p><strong>Petugas Perpustakaan</strong></p>
        </div>
    </div>

    <div class="footer-note">
        * Dokumen ini dibuat secara otomatis oleh Sistem Perpustakaan Digital Polibatam.
    </div>

</body>
</html>