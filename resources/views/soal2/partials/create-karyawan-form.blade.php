<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create or Update Karyawan') }}
        </h2>
    </header>

    <form method="post" action="{{ route('soal2') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <input type="hidden" name="id" value="{{ ($karyawan_edit!=null ? $karyawan_edit->id : '0') }}">
            <x-input-label for="nama_karyawan" :value="__('Nama Karyawan')" />
            <input id="nama_karyawan" name="nama_karyawan" type="text" class="mt-1 block w-full" value="{{ ($karyawan_edit!=null ? $karyawan_edit->nama_karyawan : '') }}" />
        </div>

        <div>

            <x-input-label for="alamat_karyawan" :value="__('Alamat Karyawan')" />
            <select id="provinsi">
            </select>
            <br>
            <select id="kabupaten">
                <option selected disabled> pilih kabupaten</option>
            </select>
            <br>
            <select  id="kecamatan">
                <option selected disabled> pilih kecamatan</option>
            </select>
            <br>
            <select  id="kelurahan">
                <option selected disabled> pilih kelurahan</option>
            </select>
            <br>
            <textarea type="text" class="mt-5" id="alamat_karyawan" name="alamat_karyawan" readonly rows="5" cols="50"></textarea>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="save">{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>

@push('custom-script')
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: 'https://whatsareyoudoing.github.io/api-wilayah-indonesia/api/provinces.json',
            data: { get_param: 'value' },
            dataType: 'json',
            success: function (data) {
                $('#provinsi').html('');
                $('#provinsi').html('<option selected disabled> pilih provinsi</option>');
                $.each(data, function(index, element) {
                    $('#provinsi').append('<option value="'+element.id+'">'+element.name+'</option>');
                });
            }
        });

        $('#provinsi').change(function(){
            let id_provinsi=$('#provinsi').val();

            $.ajax({
                type: 'GET',
                url: 'https://whatsareyoudoing.github.io/api-wilayah-indonesia/api/regencies/'+id_provinsi+'.json',
                dataType: 'json',
                success: function (data) {
                    $('#kabupaten').html('');
                    $('#kabupaten').html('<option selected disabled> pilih kabupaten</option>');
                    $.each(data, function(index, element) {
                        $('#kabupaten').append('<option value="'+element.id+'">'+element.name+'</option>');
                    });
                }
            });
        })

        $('#kabupaten').change(function(){
            let id_kabupaten=$('#kabupaten').val();

            $.ajax({
                type: 'GET',
                url: 'https://whatsareyoudoing.github.io/api-wilayah-indonesia/api/districts/'+id_kabupaten+'.json',
                dataType: 'json',
                success: function (data) {
                    $('#kecamatan').html('');
                    $('#kecamatan').html('<option selected disabled> pilih kecamatan</option>');
                    $.each(data, function(index, element) {
                        $('#kecamatan').append('<option value="'+element.id+'">'+element.name+'</option>');
                    });
                }
            });
        })

        $('#kecamatan').change(function(){
            let id_kecamatan=$('#kecamatan').val();

            $.ajax({
                type: 'GET',
                url: 'https://whatsareyoudoing.github.io/api-wilayah-indonesia/api/villages/'+id_kecamatan+'.json',
                dataType: 'json',
                success: function (data) {
                    $('#kelurahan').html('');
                    $('#kelurahan').html('<option selected disabled> pilih kelurahan</option>');
                    $.each(data, function(index, element) {
                        $('#kelurahan').append('<option value="'+element.id+'">'+element.name+'</option>');
                    });
                }
            });
        })

        $('#kelurahan').change(function(){
            let nama_provinsi=$('#provinsi option:selected').text();
            let nama_kabupaten=$('#kabupaten option:selected').text();
            let nama_kecamatan=$('#kecamatan option:selected').text();
            let nama_kelurahan=$('#kelurahan option:selected').text();

            let alamat_karyawan=nama_provinsi+', '+nama_kabupaten+', '+nama_kecamatan+', '+nama_kelurahan;

            $('#alamat_karyawan').val(alamat_karyawan);
        })

    });
</script>
@endpush
