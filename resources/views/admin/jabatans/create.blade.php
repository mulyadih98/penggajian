<x-base-layouts title="Tambah User">
    <h1 class="text-2xl mb-2">Tambah User</h1>
    <form action="{{ route('jabatans.store') }}" method="POST">
        @csrf
        <div class="px-5 pb-5 space-y-4">
            <x-text-field type="text" name="nama_jabatan" value="{{ old('nama_jabatan') }}" placeholder="Nama Jabatan"></x-text-field>
            <x-text-field type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}" placeholder="Gaji Pokok"></x-text-field>
            <x-text-field type="number" name="uang_makan" value="{{ old('uang_makan') }}" placeholder="Uang Makan"></x-text-field>
            <x-text-field type="number" name="uang_transport" value="{{ old('uang_transport') }}" placeholder="Uang Transport"></x-text-field>
            <x-button class="bg-blue-600 text-white my-2" type="submit">
                <i class="fa fa-save"></i> Simpan
            </x-button>
         </div>
    </form>
</x-base-layouts>