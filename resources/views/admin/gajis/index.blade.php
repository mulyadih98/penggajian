<x-base-layouts title="Data Gaji Guru">
    <h1 class="text-2xl mb-2">Data Gaji Guru</h1>
    <div class="w-full overflow-x-auto pt-4">
        <div class="w-2/6 my-4" x-data="{bulan: ''}">
            <x-text-field name="pilih bulan" @change="pilihAction(bulan)" x-model="bulan" id="pilih" placeholder="Bulan ini" type="text" onfocus="this.type='month'"  ></x-text-field>
        </div>
        <table class="w-full" id="gaji_table">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 bg-gray-800 text-white py-3 text-center">No</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Nama</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Jabatan</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Gaji Pokok</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Uang Makan</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Uang Transport</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Total gaji</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center">Status</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center ">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white" id="gaji">
            @foreach ($users as $user)
              <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->detail->nama_lengkap }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->jabatan->nama_jabatan }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($user->jabatan->gaji_pokok) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($user->jabatan->uang_makan) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($user->jabatan->uang_transport) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">
                  {{  toRupiah(
                        $user->jabatan->uang_transport + 
                        $user->jabatan->uang_makan + 
                        $user->jabatan->gaji_pokok
                      ) 
                  }}
                </td>
                <td class="px-4 py-3 text-ms font-semibold border">
                  {!! $user['gaji']['status'] ? '<p class="text-white  bg-green-500 text-center rounded-md font-light py-1">sudah dibayar</p>' : '<p class="text-white bg-red-500 text-center rounded-md font-light py-1">belum dibayar</p>' !!}
                </td>
                <td class="px-2 py-1 border flex flex-col space-y-2">
                  @if ($user['gaji']['status'])
                    <a href="{{ route('gajis.show', $user->gaji->id) }}" class="bg-blue-600 w-32 text-center text-white py-2 px-4 rounded-md">
                      <i class="fa fa-eye"></i> detail
                    </a>
                    <form action="{{ route('gajis.destroy',$user->gaji->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-600 w-32 text-center text-white py-2 px-4 rounded-md">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </form>
                  @else
                    <a href="{{ url('admin/gajis/bayar/') }}/{{ $user->id.'/'.date('Y-m') }}" class="bg-green-600 w-32 text-center text-white py-2 px-4 rounded-md">
                      <i class="fa fa-money-bill-wave"></i> Bayar
                    </a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a id="laporan" href="{{ url('admin/cetak-laporan/') }}/{{ date('Y-m') }}" class="bg-green-600 mt-4 block w-56 text-center text-white py-2 px-4 rounded-md">
        <i class="fa fa-money-bill-wave"></i> Cetak Laporan
      </a>
</x-base-layouts>

<script>
    const baseUrl = `{{ url('admin/gajis/') }}`;
    const gaji = document.querySelector('#gaji');
    const laporan = document.querySelector('#laporan');
    const pilihAction = async (value) => {
        const response = await fetch(`{{ url('admin/gajis/periode') }}/${value}`);
        const responseJson = await response.json();
        laporan.href = 'cetak-laporan/'+ value;
        console.log(responseJson)
        gaji.innerHTML = '';
        responseJson.forEach((user, index) => {
          gaji.innerHTML += `
            <tr>
              <td class="px-4 py-3 text-ms font-semibold border">${++index}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.detail.nama_lengkap}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.jabatan.nama_jabatan}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.jabatan.gaji_pokok}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.jabatan.uang_makan}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.jabatan.uang_transport}</td>
              <td class="px-4 py-3 text-ms font-semibold border">${user.jabatan.uang_transport + user.jabatan.uang_makan + user.jabatan.gaji_pokok}</td>
              <td class="px-4 py-3 text-ms font-semibold border">
                ${user.gaji.status 
                  ? '<p class="text-white  bg-green-500 text-center rounded-md font-light py-1">sudah dibayar</p>' 
                  : '<p class="text-white bg-red-500 text-center rounded-md font-light py-1">belum dibayar</p>'
                }
              </td>
              <td class="px-2 py-1 border flex flex-col space-y-2">
                ${user.gaji.status
                  ? `
                    <a href="${baseUrl+'/'+user.gaji.id}" class="bg-blue-600 w-32 text-center text-white py-2 px-4 rounded-md">
                      <i class="fa fa-eye"></i> detail
                    </a>
                    <form action="#" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-600 w-32 text-center text-white py-2 px-4 rounded-md">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </form>`
                  : `<a href="${baseUrl+'/bayar/'+user.id+'/'+value}" class="bg-green-600 w-32 text-center text-white py-2 px-4 rounded-md">
                      <i class="fa fa-money-bill-wave"></i> Bayar
                    </a>
                    `
                }
              </td>
            </tr>
          `;
        });
        
    }
</script>