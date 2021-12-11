<x-base-layouts title="Data Diri">
    <h1 class="text-2xl">Form Data Diri</h1>
    @php
        $user = auth()->user();
    @endphp
    <form action="{{ route('update.data.diri', $user->id) }}" method="POST" class="md:w-4/5">
        @csrf
        @method('PUT')
        <div class="px-5 pb-5 space-y-4">
            <div class="">
                <label for="nama_lengkap">Nama Lengkap</label>
                <x-text-field 
                    type="text" 
                    id="nama_lengkap"
                    name="nama_lengkap" 
                    value="{{ $user->detail->nama_lengkap }}" 
                    placeholder="Nama Lengkap"></x-text-field>
            </div>
            <div class="">
                <label for="tempat_lahir">Tempat Lahir</label>
                <x-text-field 
                    type="text" 
                    id="tempat_lahir"
                    name="tempat_lahir" 
                    value="{{ $user->detail->tempat_lahir }}" 
                    placeholder="Tempat Lahir"></x-text-field>
            </div>
            <div class="">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <x-text-field 
                    type="text"
                    onfocus="this.type='date'" 
                    id="tanggal_lahir"
                    name="tanggal_lahir" 
                    value="{{ $user->detail->tanggal_lahir }}" 
                    placeholder="Tanggal Lahir"></x-text-field>
            </div>
            <div class="">
                <label for="alamat">Alamat</label>
                <x-text-field 
                    type="text" 
                    id="alamat"
                    name="alamat" 
                    value="{{ $user->detail->alamat }}" 
                    placeholder="Alamat"></x-text-field>
            </div>
            <div class="">
                <label for="no_telepon">No Telepon</label>
                <x-text-field 
                    type="text" 
                    id="no_telepon"
                    name="no_telepon" 
                    value="{{ $user->detail->no_telepon }}" 
                    placeholder="No Telepon"></x-text-field>
            </div>
            <div class="">
                <label for="agama">Agama</label>
                <x-select name="agama" placeholder="Agama" id="agama">
                    @php
                        $agama = ['Islam', 'Kristen', 'Budha', 'Hindu', 'Konghucu'];
                    @endphp
                    <option value="">-- Pilih Agama --</option>
                    @foreach ($agama as $item)
                        <option {{ $item === $user->detail->agama ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="flex items-center" >
                <x-button class="bg-blue-600 text-white my-2" type="submit">
                    <i class="fa fa-save"></i> Simpan
                </x-button>
            </div>
         </div>
    </form>
</x-base-layouts>
