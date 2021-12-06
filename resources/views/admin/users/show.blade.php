<x-base-layouts title="Detail User">
    <h1 class="text-2xl">Detail User {{ $user->detail->nama_lengkap }}</h1>
    <div class="px-5 py-5 bg-white shadow-md rounded-md space-y-4">
        <p><span class="w-32 inline-block">NIP </span>: {{ $user->nip }}</p>
        <p><span class="w-32 inline-block">Nama </span>: {{ $user->detail->nama_lengkap }}</p>
        <p><span class="w-32 inline-block">Email </span>: {{ $user->email }}</p>
        <p><span class="w-32 inline-block">Jabatan </span>: {{ $user->jabatan->nama_jabatan }}</p>
        <p><span class="w-32 inline-block">Tanggal Lahir </span>: {{ $user->detail->tanggal_lahir }}</p>
        <p><span class="w-32 inline-block">Tempat Lahir </span>: {{ $user->detail->tempat_lahir }}</p>
        <p><span class="w-32 inline-block">Alamat </span>: {{ $user->detail->alamat }}</p>
        <p><span class="w-32 inline-block">No Telepon </span>: {{ $user->detail->no_telepon }}</p>
        <p><span class="w-32 inline-block">Agama </span>: {{ $user->detail->agama }}</p>

        <div class="flex">
            <a href="{{ route('users.edit',$user->id) }}" class="inline-block px-2 py-2 font-medium tracking-wide  capitalize transition duration-300 ease-in-out transform rounded-md hover:bg-gray-300 focus:outline-none active:scale-95 bg-green-600 text-white">
                <i class="fa fa-edit"></i> Ubah Data
            </a>
    
            <x-modal-button class="ml-2"> 
                <i class="fa fa-key"></i> Reset Password
            </x-modal-button>
        </div>
</x-base-layouts>

<x-modal url="{{ route('reset-password',$user->id) }}" cancleButton="Tidak" saveButton="Iya" title="Reset Password" method="PUT">
    <p>
        Apa Anda Yakin ingin mengatur ulang Kata sandi {{ $user->detail->nama_lengkap }} ?
    </p>
</x-modal>

