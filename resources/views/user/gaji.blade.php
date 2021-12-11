<x-base-layouts title="Data Gaji">
    <h1 class="text-2xl">Data Gaji</h1>
    <div class="w-full overflow-x-auto mt-4">
        <table class="w-full" id="jabatan_table">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 bg-gray-800 text-white py-3 text-center">No</th>
              <th class="px-4 bg-gray-800 text-white py-3">Nama</th>
              <th class="px-4 bg-gray-800 text-white py-3">Jabatan</th>
              <th class="px-4 bg-gray-800 text-white py-3">Periode</th>
              <th class="px-4 bg-gray-800 text-white py-3">Total Gaji</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center ">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white">
              @if ($gaji->isEmpty())
                  <tr>
                      <td colspan="6" class="text-center py-2">Belum ada data</td>
                  </tr>
              @endif
              @foreach ($gaji as $g)
                <tr class="text-gray-700">
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $g->user->detail->nama_lengkap }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ $g->user->jabatan->nama_jabatan }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ date('F Y', strtotime($g->periode)) }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border">{{ toRupiah($g->total_gaji) }}</td>
                    <td class="px-4 py-3 text-ms font-semibold border w-36">
                        <a href="{{ route('slip.gaji', $g->id) }}" target="_blank" class="bg-green-600 text-white py-2 px-4 block w-36 rounded-md">
                            <i class="fa fa-print"></i> Cetak Slip
                        </a>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>
</x-base-layouts>