<x-base-layouts title="Pengaturan Akun">
    <h1 class="text-2xl">Pengaturan Akun</h1>
    <form action="{{ route('ganti.email') }}" method="POST">
        @csrf
        @method('put')
        <div class="w-5/6">
            <h2 class="text-xl my-4">Ganti Email</h2>
            <label for="email-lama">Email Lama</label>
            <x-text-field 
            type="text" 
            id="email-lama"
            value="{{ auth()->user()->email }}"
            name="email_lama"
            readonly
            placeholder="Email Baru"></x-text-field>
            <label for="email">Email Baru</label>
            <x-text-field 
            type="text" 
            id="email"
            name="email"
            placeholder="Email Baru"></x-text-field>
        </div>
        <x-button class="bg-blue-600 text-white my-2" type="submit">
            <i class="fa fa-save"></i> Simpan
        </x-button>
    </form>
    <hr>    
    <form action="{{ route('ganti.password') }}" method="POST">
        @csrf
        @method('put')
        <div class="w-5/6">
            <h2 class="text-xl my-4">Ganti Password</h2>
            <label for="password">Password</label>
            <x-text-field 
            type="password" 
            id="password"
            name="password"
            placeholder="Password"></x-text-field>
            <label for="password_confirmation">Ulangi Password</label>
            <x-text-field 
            type="password" 
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Ketik Ulang Password"></x-text-field>
        </div>
        <x-button class="bg-blue-600 text-white my-2" type="submit">
            <i class="fa fa-save"></i> Simpan
        </x-button>
    </form>
</x-base-layouts>