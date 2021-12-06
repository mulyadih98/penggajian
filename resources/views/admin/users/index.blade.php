<x-base-layouts title="Data User">
    <h1 class="text-2xl mb-2">Data User</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md">
      <i class="fa fa-plus"></i> Tambah User
    </a>
    <div class="w-full overflow-x-auto mt-4">
        <table class="w-full" id="user_table">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
              <th class="px-4 bg-gray-800 text-white py-3 text-center">NIP</th>
              <th class="px-4 bg-gray-800 text-white py-3">Nama</th>
              <th class="px-4 bg-gray-800 text-white py-3">Jabatan</th>
              <th class="px-4 bg-gray-800 text-white py-3">No Telepon</th>
              <th class="px-4 bg-gray-800 text-white py-3">Alamat</th>
              <th class="px-4 bg-gray-800 text-white py-3 text-center ">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($users as $user)
              <tr class="text-gray-700">
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user['nip'] }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->detail->nama_lengkap }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->jabatan->nama_jabatan }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->detail->no_telepon ? $user->detail->no_telepon : 'belum ada no telepon'; }}</td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $user->detail->alamat ? $user->detail->alamat : 'belum ada alamat'; }}</td>
                <td class="px-2 py-1 border flex flex-col space-y-2">
                  <a href="{{ url('admin/users',$user->id) }}" class="bg-blue-600 w-32 text-center text-white py-2 px-4 rounded-md">
                    <i class="fa fa-eye"></i> detail
                  </a>
                  <form action="{{ route('users.destroy',$user->id) }}" method="POST">
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

<script>
  const userTable = new DataTable("#user_table", {
    perPageSelect: [10, 20, 30, 40, 50, 100],
  });
</script>