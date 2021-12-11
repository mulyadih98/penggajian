<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('images/logo/favicon.ico') }}">
    <meta name="author" content="Mulyadih1998">
    <meta name="description" content="Aplikasi penggajian guru di SMP IT Bina Adzkia">
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji {{ $data->user->detail->nama_lengkap }} Periode {{ date('F Y', strtotime($data->periode)) }}</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }
        .kop-surat {
            padding: 10px 5px;
        }
        .nama-sekolah  {
            text-align: center;
            width: 650px;
            margin-left: 80px;
        }
        .logo {
            position: absolute;
            left: 80px;
            width: 100px;
        }
        .nama-sekolah p {
            font-size: 10px;
        }
        hr {
            height: 2px;
            background: #000;
            margin-top: 10px;
            width: 90%;
            margin: 10px auto;
        }
        .main {
            width: 94%;
            margin: 0 auto; 
        }
        
        .heading {
            color: #1F2937;
        }

        .w-32 {
            width: 128px;
        }

        .inline-block {
            display: inline-block;
        }
        .mt-2{
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <img src="./images/logo/logo-kecil.png" class="logo" alt="logo">
        <div class="nama-sekolah">
            <h3>Sekolah Menengah Pertama Islam Terpadu</h3>
            <h1>Bina Adzkia Depok</h1>
            <p>Jl. Terusan H. Nawi Malik No.154, Serua, Kec. Bojongsari, Kota Depok, Jawa Barat 16517 <br>
            Tlpn. +62 852-1592-7079 Email. <i>smpbinaadzkia@gmail.com</i></p>
        </div>
    </div>
    <hr>

    <div class="main">
        <div style="
			width:60%;
			float:left;
			padding-left: 10px;
		">
            <p style="font-size: 24px">SMP IT Bina Adzkia</p>
            <p>Periode {{ date('F Y', strtotime($data->periode)) }}</p>
        </div>
        <div style="
			float:left;
			margin-left: 5px;
			width:50%;
		">
            <p>NIP : {{ $data->user->nip }}</p>
            <p>Nama : {{ $data->user->detail->nama_lengkap }}</p>
            <p>Jabatan : {{ $data->user->jabatan->nama_jabatan }}</p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="main" style="margin-top: 20px">
        <div style="
			width:60%;
			float:left;
			padding-left: 10px;
		">
            <h4 class="heading">* Penerimaan</h4>
            <p><span class="w-32 inline-block mt-2">NIP </span>: {{ $data['user']['nip'] }}</p>
            <p><span class="w-32 inline-block mt-2">Gaji Pokok </span>: {{ toRupiah($data->gaji_pokok) }}</p>
            <p><span class="w-32 inline-block mt-2">Uang Transport </span>: {{ toRupiah($data->uang_transport) }}</p>
            <p><span class="w-32 inline-block mt-2">Uang Makan</span>: {{ toRupiah($data->uang_makan) }}</p>
            <p><span class="w-32 inline-block mt-2">Bonus </span>: {{ toRupiah($data->bonus) }}</p>
            <p><span class="w-32 inline-block mt-2">Lembur </span>: {{ toRupiah($data->lembur) }}</p>
            <p><span class="w-32 inline-block mt-2">Total Gaji </span>: {{ toRupiah($data->total_gaji) }}</p>
            
        </div>
        <div style="
			width:50%;
			float:left;
			padding-left: 10px;
		">
            <h4 class="heading">* Potongan</h4>
            @if (!$data->potongans->isEmpty())
                <ol style="list-style: none">
                    @foreach ($data->potongans as $item)
                    <li> {{ $loop->iteration }}. {{ $item['jenis_potongan'] }} - {{ toRupiah($item['jumlah']) }}</li>
                    @endforeach
                </ol>
            @else
                <p>Tidak Ada potongan</p>
            @endif
            <h4 class="heading mt-2">* Diterima</h4>
            <p style="mt-2"><span>Gaji Yang Diterima </span>: {{ toRupiah($data->diterima) }}</p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="main" style="margin-top: 80px">
        <div style="
			width:30%;
			float:left;
			padding-left: 10px;
		">
            <h5 style="text-align:center">Diserahkan oleh <br> bendahara</h5>
            <br>
            <br>
            <br>
            <p style="text-align: center"> (...................)</p>
        </div>
        <div style="
			width:30%;
			float:left;
			padding-left: 10px;
		"></div>
        <div style="
			width:30%;
			float:left;
			padding-left: 10px;
		">
            <h5 style="text-align:center">Diterima <br> &nbsp; </h5>
            <br>
            <br>
            <br>
            <p style="text-align: center"> {{ $data->user->detail->nama_lengkap }}</p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="main" style="margin-top: 10px">
        <div style="
			width:30%;
			float:left;
			padding-left: 10px;
		"></div>
        <div style="
			width:30%;
			float:left;
			padding-left: 10px;
		">
            <h5 style="text-align:center">Mengetahui<br> Kepala Sekolah</h5>
            <br>
            <br>
            <br>
            <p style="text-align: center"> (...................)</p>
        </div>
        <div style="width:30%;float:left;padding-left: 10px;
		"></div>
        <div style="clear: both;"></div>
    </div>
</body>
</html>