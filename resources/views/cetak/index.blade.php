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
<div class="container my-4">
    <h2 class="h2 text-center mb-5">Data Pendaftar</h2>
    @foreach ($dataUser as $no => $value)

    <table class="table ">
        <tr>
            <td rowspan="4"><img src="{{ asset('foto/' . $value->foto) }}" alt="Foto Pendaftar" width="200"></td>
            <th>Nama</th>
            <td>{{$value->nama}}</td>
        </tr>
        <tr>
            <th>Alamat Sekarang</th>
            <td>{{$value->alamat_sekarang}}</td>
        </tr>
        <tr>
            <th>Alamat KTP</th>
            <td>{{$value->alamat_ktp}}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{$value->provinsi}}</td>
        </tr>

        <tr>
            <td></td>
            <th>Kota</th>
            <td>{{$value->kabupaten}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Nomer Handphone</th>
            <td>{{$value->no_hp}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Email</th>
            <td>{{$value->email}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Tanggal Lahir</th>
            <td>{{$value->tanggal_lahir}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Jenis Kelamin</th>
            <td>{{$value->jenis_kelamin}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Status Pernikahan</th>
            <td>{{$value->status_menikah}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Agama</th>
            <td>{{$value->agama}}</td>
        </tr>
        <tr>
            <td></td>
            <th>Kewarganegaraan</th>
            <td>{{$value->kewarganegaraan}}</td>
        </tr>
    </table>
    @if (auth()->user()->id_role == 1)
    <a href="{{route('dashboard.user')}}" class="btn btn-outline-secondary">Kembali</a>
    @endif
    @if (auth()->user()->id_role == 2)
    <a href="{{route('dashboard.admin')}}" class="btn btn-outline-secondary">Kembali</a>
    @endif
    <a href="{{route('cetak.pdf', ['id' => $value->id])}}" class="btn btn-outline-success">Cetak</a>
    @endforeach



</div>

@extends('footer')