<x-base-layouts title="Data Jabatan">
    <h1 class="text-2xl mb-2">Data Jabatan</h1>
    <a href="{{ route('jabatans.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md">
        <i class="fa fa-plus"></i> Tambah Jabatan
    </a>

    <div class="w-full overflow-x-auto mt-4">
        <table class="w-full" id="jabatan_table">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 bg-gray-800 text-white py-3 text-center">No</th>
              <th class="px-4 bg-gray-800 text-white py-3">Jabatan</th>
              <th class="px-4 bg-gray-800 text-white py-3">Gaji POkok</th>
              <th class="px-4 bg-gray-800 text-white py-3">Uang Makan</th>
              <th class="px-4 bg-gray-800 text-white py-3">Uang Transport</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center ">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($jabatans as $jabatan)
              <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $jabatan->nama_jabatan }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($jabatan->gaji_pokok) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($jabatan->uang_makan) }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($jabatan->uang_transport) }}</td>
                <td class="px-2 py-1 border flex flex-col space-y-2">
                  <a href="{{ route('jabatans.show', $jabatan->id) }}" class="bg-blue-600 w-32 text-center text-white py-2 px-4 rounded-md">
                    <i class="fa fa-eye"></i> detail
                  </a>
                  <form action="{{ route('jabatans.destroy',$jabatan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 w-32 text-center text-white py-2 px-4 rounded-md">
                      <i class="fa fa-trash"></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</x-base-layouts>