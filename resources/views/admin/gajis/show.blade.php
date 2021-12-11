<x-base-layouts title="Data Slip Gaji">
    <div class="flex space-x-2">
        <div class="w-3/6">
            <h1 class="text-2xl">SMP IT Bin Adzkia</h1>
            <h2 class="text-xl">{{ date('F Y', strtotime($user['periode'])) }}</h2>
        </div>
        <div class="w-3/6">
            <p><span class="w-32 inline-block">NIP </span>: {{ $user['user']['nip'] }}</p>
            <p><span class="w-32 inline-block">Nama </span>: {{ $user->user->detail->nama_lengkap }}</p>
            <p><span class="w-32 inline-block">Jabatan </span>: {{ $user->user->jabatan->nama_jabatan }}</p>
        </div>
    </div>
    <div class="flex mt-8">
        <div class="w-3/6 space-y-2">
            <h3 class="text-xl">* Penerimaan</h3>
            <p><span class="w-32 inline-block">Gaji Pokok </span>: {{ toRupiah($user->gaji_pokok) }}</p>
            <p><span class="w-32 inline-block">Uang Transport </span>: {{ toRupiah($user->uang_transport) }}</p>
            <p><span class="w-32 inline-block">Uang Makan</span>: {{ toRupiah($user->uang_makan) }}</p>
            <p><span class="w-32 inline-block">Bonus </span>: {{ toRupiah($user->bonus) }}</p>
            <p><span class="w-32 inline-block">Lembur </span>: {{ toRupiah($user->lembur) }}</p>
            <p><span class="w-32 inline-block">Total Gaji </span>: {{ toRupiah($user->total_gaji) }}</p>
        </div>
        <div class="w-3/6 space-y-2">
            <h3 class="text-xl">* Potongan</h3>
            @if (!$user->potongans->isEmpty())
                <ol>
                    @foreach ($user->potongans as $item)
                    <li>{{ $item['jenis_potongan'] }} - {{ toRupiah($item['jumlah']) }}</li>
                    @endforeach
                </ol>
            @else
                <p>Tidak Ada potongan</p>
            @endif
            <h3 class="text-xl mt-4">* Diterima</h3>
            <p><span class="inline-block ">Gaji Yang Diterima </span>: {{ toRupiah($user->diterima) }}</p>
            
        </div>
    </div>
    <a href="{{ route('slip.gaji',$user->id) }}" class="bg-blue-600 text-white py-2 px-4 mt-2 block w-36 text-center rounded-md">
        <i class="fa fa-print"></i> Cetak Slip
    </a>
</x-base-layouts>