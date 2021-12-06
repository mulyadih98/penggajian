<x-base-layouts title="Detail User">
    <h1 class="text-2xl">Detail Jabatan {{ $jabatan->nama_jabatan }}</h1>
    <div class="px-5 py-5 bg-white shadow-md rounded-md space-y-4">
        <p><span class="w-32 inline-block">Nama Jabatan </span>: {{ $jabatan->nama_jabatan }}</p>
        <p><span class="w-32 inline-block">Gaji Pokok </span>: {{ $jabatan->gaji_pokok }}</p>
        <p><span class="w-32 inline-block">Uang Makan </span>: {{ $jabatan->uang_makan }}</p>
        <p><span class="w-32 inline-block">Uang TRansport </span>: {{ $jabatan->uang_transport }}</p>

        <div class="flex">
            <a href="{{ route('jabatans.index') }}" class="inline-block px-2 py-2 font-medium tracking-wide  capitalize transition duration-300 ease-in-out transform rounded-md hover:bg-gray-300 focus:outline-none active:scale-95 bg-blue-400 text-white mr-2">
                <i class="fa fa-arrow-circle-left"></i> Kembali
            </a>
            <a href="{{ route('jabatans.edit',$jabatan->id) }}" class="inline-block px-2 py-2 font-medium tracking-wide  capitalize transition duration-300 ease-in-out transform rounded-md hover:bg-gray-300 focus:outline-none active:scale-95 bg-green-600 text-white">
                <i class="fa fa-edit"></i> Ubah Data
            </a>
        </div>
</x-base-layouts>
