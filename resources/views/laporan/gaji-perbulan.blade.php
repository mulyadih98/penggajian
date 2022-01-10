<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="Mulyadih1998">
  <meta name="description" content="Aplikasi penggajian guru di SMP IT Bina Adzkia">
  <meta name="robots" content="index, follow" />
  <title>Laporan Gaji Bulan {{ bulan($bulan) }} Tahun {{ $tahun }}</title>
  <style>
    table {
      border:1px solid black;
      border-collapse:collapse;
      width: 100%;
    }
    td, th { 
      border: 1px solid #000; 
    }
    th, td {
      padding: 2px 8px;
    }
    .text-center {
      text-align: center;
    }
    .uppercase {
      text-transform: uppercase;
    }
    .font-serif {
      font-family: Arial, Helvetica, sans-serif;
    }
    .line-5 {
      line-height: 1.5;
    }
  </style>
</head>
<body>
  <p class="text-center font-serif line-5">
    TANDA TERIMA GAJI GURU DAN PEGAWAI <br>
    BULAN <span class="uppercase">{{ bulan($bulan) }}</span> {{ $tahun }} <br>
    SMPIT BINA ADZKIA
  </p>
  <br>
  <br>
  <table>
    <thead>
      <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>JABATAN</th>
        <th>JUMLAH GAJI</th>
        <th>TANGGAL TERIMA</th>
      </tr>
    </thead>
    <tbody>
      @php
        $total = 0;
      @endphp
      @foreach ($gaji as $item)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $item->detail->nama_lengkap }}</td>
            <td class="text-center">{{ $item->jabatan->nama_jabatan }}</td>
            <td>{{ $item->gaji['status'] ? toRupiah($item->gaji->diterima) : toRupiah(0) }}</td>
            <td class="text-center">{{ $item->gaji['status'] ? $item->gaji->created_at->format('d-M-Y') : 'Belum Menerima Gaji' }}</td>
          </tr>
          @php
            $item->gaji['status'] ? $total += $item->gaji->diterima : 0;
          @endphp
      @endforeach
      <tr>
        <td colspan="3" class="text-center">JUMLAH</td>
        <td>{{ toRupiah($total) }}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div style="float: left; text-align: center">
    <p style="font-size: 12px">
    SETUJU DIBAYAR <br>
    Mengetahui <br>
    Kepala Sekolah SMPIT BINA ADZKIA <br>
    </p>
    <br>
    <br>
    <br>
    (.................................)
  </div>
  <div style="float: right; text-align:center;">
    <p style="font-size: 12px"><br>Bendahara</p>
    <br>
    <br>
    <br>
    (..............................)
  </div>
</body>
</html>