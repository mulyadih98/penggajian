<x-base-layouts title="Bayar Gaji Guru"> 
    <h1 class="text-2xl mb-2">Form Pembayaran Gaji</h1>
    <h2 class="text-lg">Nama Pegawai : {{ $user->detail->nama_lengkap }}</h2>
    <div x-data="app()">
        <form method="POST" id="my_form" x-on:submit="event.preventDefault();">
            @csrf
            <div class="flex flex-col md:flex-row">
                <div class="px-5 pb-5 space-y-4 md:w-2/4">
                    <input type="hidden" class="none" name="user_id" value="{{ $user->id }}">
                    <h3 class="text-xl -p-x-2">Pembayaran</h3>
                    <x-text-field
                        type="number"
                        readonly
                        id="gapok"
                        name="gaji_pokok"
                        value="{{ $user->jabatan->gaji_pokok }}"
                        placeholder="Gaji Pokok">
                    </x-text-field>
                    <x-text-field
                        type="number"
                        readonly
                        id="ut"
                        name="uang_transport"
                        value="{{ $user->jabatan->uang_transport }}"
                        placeholder="Gaji Pokok">
                    </x-text-field>
                    <x-text-field
                        type="number"
                        readonly
                        id="um"
                        name="uang_makan"
                        value="{{ $user->jabatan->uang_makan }}"
                        placeholder="Gaji Pokok">
                    </x-text-field>
                    <x-text-field
                        type="number"
                        name="bonus"
                        x-model="bonus"
                        min="0"
                        @keyup="totalGaji()"
                        @change="totalGaji()"
                        id="bonus"
                        value="{{ old('bonus') }}"
                        placeholder="Bonus">
                    </x-text-field>
                    <x-text-field
                        type="number"
                        name="lembur"
                        id="lembur"
                        @keyup="totalGaji()"
                        @change="totalGaji()"
                        x-model="lembur"
                        placeholder="Lembur">
                    </x-text-field>
                    <x-text-field
                        type="number"
                        id="total_gaji"
                        name="total_gaji"
                        x-model="total"
                        placeholder="Total Gaji">
                    </x-text-field>
                </div>
                <div class="px-5 pb-5 space-y-4 md:w-2/4">
                    <input type="hidden" name="periode" value="{{ $periode }}">
                    <h3 class="text-xl">Potongan</h3>
                    <div class="flex space-x-1">
                        <div class="w-1/2">
                            <x-text-field
                                type="text"
                                name="jenis_potongan[]"
                                placeholder="Jenis Potongan">
                            </x-text-field>
                        </div>
                        <div class="w-1/2">
                            <x-text-field
                                type="number"
                                class="potongan"
                                x-model='potongan'
                                name="jumlah[]"
                                @change.prevent="potongGaji()"
                                placeholder="Jumlah Potongan">
                            </x-text-field>
                        </div>
                    </div>
                    <div class="flex space-x-1">
                        <div class="w-1/2">
                            <x-text-field
                                type="text"
                                name="jenis_potongan[]"
                                placeholder="Jenis Potongan">
                            </x-text-field>
                        </div>
                        <div class="w-1/2">
                            <x-text-field
                                type="number"
                                class="potongan"
                                x-model='potongan2'
                                @change.prevent="potongGaji()"
                                name="jumlah[]"
                                placeholder="Jumlah Potongan">
                            </x-text-field>
                        </div>
                    </div>
                    <div class="flex space-x-1">
                        <div class="w-1/2">
                            <x-text-field
                                type="text"
                                name="jenis_potongan[]"
                                placeholder="Jenis Potongan">
                            </x-text-field>
                        </div>
                        <div class="w-1/2">
                            <x-text-field
                                type="number"
                                class="potongan"
                                @change.prevent="potongGaji()"
                                x-model='potongan3'
                                name="jumlah[]"
                                placeholder="Jumlah Potongan">
                            </x-text-field>
                        </div>
                    </div>
                    <h3 class="text-xl -p-x-2">Diterima</h3>
                    <x-text-field
                        type="number"
                        x-model="diterima"
                        name="diterima"
                        placeholder="Diterima">
                    </x-text-field>
                    <div class="flex space-x-2">
                        <x-button type="button" class="text-white bg-green-600" @click.prevent="potongGaji()">
                            <i class="fa fa-calculator"></i> Hitung
                        </x-button>
                        <x-button type="button" class="text-white bg-blue-600" @click.prevent="bayar()">
                            <i class="fa fa-money-bill-wave"></i> Bayar
                        </x-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-base-layouts>

<script>
    const app = () => {
        return {
            gapok: `{{ $user->jabatan->gaji_pokok }}`,
            ut: `{{ $user->jabatan->uang_transport }}`,
            um: `{{ $user->jabatan->uang_makan }}`,
            bonus: 0,
            lembur: 0,
            total: parseInt(`{{ $user->jabatan->gaji_pokok }}`) + parseInt(`{{ $user->jabatan->uang_transport }}`) + parseInt(`{{ $user->jabatan->uang_makan }}`),
            potongan:0,
            diterima:0,
            potongan2:0,
            potongan3:0,
            totalGaji(){
                this.total = parseInt(this.gapok) + parseInt(this.ut) + parseInt(this.um) + parseInt(this.lembur) + parseInt(this.bonus);
                this.potongGaji();
            },
            potongGaji(){
                this.diterima = parseInt(this.total) - parseInt(this.potongan) -parseInt(this.potongan2) - parseInt(this.potongan3);
            },
            async bayar(){
                if(this.diterima == 0){
                   alert("Tekan Tombol hitung terlebih dahulu");
                   return;
                }
                const response = await fetch(`{{ route('gajis.store') }}`, {
                                        method: 'post',
                                        body: new URLSearchParams(new FormData(document.querySelector('#my_form'))),
                                 });
                const responseJosn = await response.json();
                if(response.status === 201){
                    window.location.replace(`{{ route('gajis.index') }}`);
                }
            }
        }
    }
</script>