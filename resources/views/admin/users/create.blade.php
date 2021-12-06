<x-base-layouts title="Tambah User">
    <h1 class="text-2xl mb-2">Tambah User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="px-5 pb-5 space-y-4">
            <x-text-field type="text" name="nip" value="{{ old('nip') }}" placeholder="NIP" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></x-text-field>
            <x-text-field type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama Lengkap"></x-text-field>
            <x-text-field type="text" name="email" placeholder="Email" value="{{ old('email') }}"></x-text-field>
            <x-select name="jabatan_id" placeholder="Jabatan">
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nama_jabatan'] }}</option>
                @endforeach
            </x-select>
            <div class="flex">
               <div class="flex-grow w-1/4 pr-2">
                    <x-text-field name="tempat_lahir" placeholder="Tempat Lahir" type="text" value="{{ old('tempat_lahir') }}"></x-text-field>
                </div>
                <div class="flex-grow">
                    <x-text-field name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" onblur="(this.type='text')" onfocus="(this.type='date')"></x-text-field>
                </div>
            </div>
            <x-text-field name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" type="text"></x-text-field>
            <x-text-field name="no_telepon" placeholder="No telepon" value="{{ old('no_telepon') }}" maxlength="13" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></x-text-field>
            <x-select name="agama" placeholder="Agama">
                @php
                    $agama = ['Islam', 'Kristen', 'Budha', 'Hindu', 'Konghucu'];
                @endphp
                <option value="">-- Pilih Agama --</option>
                @foreach ($agama as $item)
                    <option>{{ $item }}</option>
                @endforeach
            </x-select>
            <x-button class="bg-blue-600 text-white my-2" type="submit">
                <i class="fa fa-save"></i> Simpan
            </x-button>
         </div>
    </form>
</x-base-layouts>