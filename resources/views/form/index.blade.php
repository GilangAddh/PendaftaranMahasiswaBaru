@extends('head')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
    <div class="">{{ Session::get('alert-' . $msg) }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
@if($errors->any())
<div class="alert alert-danger border-0 alert-dismissible fade show m-5 my-2">
    <div class="">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif
<div class="container border rounded-3 p-2 my-4">
    <div class="container text-center my-3">
        <h1 class="h2">Form Pendaftaran Mahasiswa Baru</h1>
    </div>
    <div class="container">
        <form action="{{route('pendaftaran')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="">
            <input type="hidden" name="id_users" id="id_users" value="{{auth()->user()->id}}">

            <label>Nama</label><br>
            <input name="nama" class="form-control" type="text" required><br>

            <div class="row">
                <div class="col">
                    <label>Alamat KTP</label><br>
                    <textarea name="alamat_ktp" id="alamat_ktp" rows="5" class="form-control" required></textarea><br>
                </div>
                <div class="col">
                    <label>Alamat Sekarang</label><br>
                    <textarea name="alamat_sekarang" id="alamat_sekarang" rows="5" class="form-control"
                        required></textarea><br>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Provinsi</label><br>
                    <select name="provinsi" id="provinsi" class="form-control">
                        <option value="" disabled selected>Pilih Provinsi Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kabupaten/Kota</label><br>
                    <select name="kabupaten" id="kota" class="form-control">
                        <option value="">Pilih Kota</option>

                    </select><br>
                </div>
            </div>

            <label>Kecamatan</label><br>
            <input name="kecamatan" class="form-control" type="text" required><br>

            <div class="row">
                <div class="col">
                    <label>No HP</label><br>
                    <input name="no_hp" class="form-control" type="number" required><br>
                </div>
                <div class="col">
                    <label>Email</label><br>
                    <input name="email" class="form-control" type="email" required><br>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <label>Tanggal Lahir</label><br>
                    <input name="tanggal_lahir" class="form-control" type="date" required><br>
                </div>
                <div class="col">
                    <label>Provinsi Tempat Lahir</label><br>
                    <select name="provinsi_lahir" id="provinsi_lahir" class="form-control">
                        <option value="" disabled selected>Pilih Provinsi Lahir Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kabupaten/Kota Tempat Lahir</label><br>
                    <select name="kota_lahir" id="kota_lahir" class="form-control">
                        <option value="">Pilih Kota</option>

                    </select><br>
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    <label>Jenis Kelamin</label><br>

                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="" disabled selected>Pilih Jenis Kelamin Anda</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br>
                </div>
                <div class="col">
                    <label>Status Menikah</label><br>
                    <select name="status_menikah" id="status_menikah" class="form-control">
                        <option value="" disabled selected>Pilih Status Pernikahan Anda</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Lain-lain(Janda/Duda)">Lain-lain(Janda/Duda)</option>
                    </select><br>
                </div>
                <div class="col">
                    <label>Agama</label><br>
                    <select name="agama" id="agama" class="form-control">
                        <option value="" disabled selected>Pilih Agama Anda</option>
                        @foreach ($dataAgama as $nomor => $value)
                        <option value="{{ $value->nama }}">{{ $value->nama }}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kewarganegaraan</label><br>
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                        <option value="" disabled selected>Pilih Kewarganegaraan Anda</option>
                        <option value="WNI Asli">WNI Asli</option>
                        <option value="WNI Keturunan">WNI Keturunan</option>
                        <option value="Warga Negara Asing">Warga Negara Asing</option>
                    </select><br>
                </div>
            </div>
            <label>Pas Foto</label><br>
            <input name="foto" id="foto" type="file" class="form-control" required><br>


            <div class="row my-5">
                <div class="col">
                    <a class="btn btn-outline-danger" href="{{route('dashboard.user')}}" style="width: 80px;">Back</a>
                    <input class="btn btn-outline-primary" type="submit" value="Save" style="width: 80px;">
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#provinsi').change(function() {
    var provinsiId = $(this).val();

    if (provinsiId) {
        $.ajax({
            url: '/get-kota/' + provinsiId,
            type: 'GET',
            success: function(data) {
                $('#kota').empty();
                $('#kota').append('<option value="">Pilih Kota</option>');
                $.each(data, function(key, value) {
                    $('#kota').append('<option value="' + value.id + '">' + value.nama +
                        '</option>');
                });
            }
        });
    } else {
        $('#kota').empty();
        $('#kota').append('<option value="">Pilih Kota Kosong</option>');
    }
});

$('#provinsi_lahir').change(function() {
    var provinsiId = $(this).val();

    if (provinsiId) {
        $.ajax({
            url: '/get-kota/' + provinsiId,
            type: 'GET',
            success: function(data) {
                $('#kota_lahir').empty();
                $('#kota_lahir').append('<option value="">Pilih Kota</option>');
                $.each(data, function(key, value) {
                    $('#kota_lahir').append('<option value="' + value.id + '">' + value
                        .nama +
                        '</option>');
                });
            }
        });
    } else {
        $('#kota_lahir').empty();
        $('#kota_lahir').append('<option value="">Pilih Kota Kosong</option>');
    }
});
</script>

@extends('footer')