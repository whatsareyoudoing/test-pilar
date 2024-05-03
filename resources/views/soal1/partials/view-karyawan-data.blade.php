<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Data Karyawan') }}
        </h2>
    </header>

    <table class="w-full">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
          <tr>
            <th class="text-start tracking-wide">ID</th>
            <th class="text-start tracking-wide">Nama</th>
            <th class="text-start tracking-wide">Alamat</th>
            <th class="text-start tracking-wide">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $k)
            <tr>
                <td class="text-sm text-left">{{ $k->id }}</td>
                <td class="text-sm text-left">{{ $k->nama_karyawan }}</td>
                <td class="text-sm text-left">{{ $k->alamat_karyawan }}</td>
                <td class="text-sm text-left">
                    <button class="bg-red-700"><a href="{{ route('soal1.edit',$k->id) }}">Edit</a></button>
                    |
                    <button class="bg-red-700"><a href="{{ route('soal1.delete',$k->id) }}">Delete</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

</section>
