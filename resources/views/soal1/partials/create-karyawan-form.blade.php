<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create or Update Karyawan') }}
        </h2>
    </header>

    <form method="post" action="{{ route('soal1') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <input type="hidden" name="id" value="{{ ($karyawan_edit!=null ? $karyawan_edit->id : '0') }}">
            <x-input-label for="nama_karyawan" :value="__('Nama Karyawan')" />
            <input id="nama_karyawan" name="nama_karyawan" type="text" class="mt-1 block w-full" value="{{ ($karyawan_edit!=null ? $karyawan_edit->nama_karyawan : '') }}" />
        </div>

        <div>
            <x-input-label for="alamat_karyawan" :value="__('Alamat Karyawan')" />
            <input id="alamat_karyawan" name="alamat_karyawan" type="text" class="mt-1 block w-full" value="{{ ($karyawan_edit!=null ? $karyawan_edit->alamat_karyawan : '') }}" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
