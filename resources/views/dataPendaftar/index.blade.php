@extends('head')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2">
    <div class="text-white">{{ Session::get('alert-' . $msg) }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
<div class="container-fluid">
    <div class="container text-center my-3">
        <h1 class="h2">Data Pendaftar Mahasiswa Baru</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-1">
                <a href="{{route('dataPendaftar.tambah')}}" class="btn btn-sm btn-outline-primary"><i
                        class="bi bi-plus-square-fill"></i>
                    Tambah</a>
            </div>
            <div class="col-1">
                <a href="{{route('dataUser.index')}}" class="btn btn-sm btn-outline-success"><i
                        class="bi bi-book-fill"></i>
                    Data User</a>
            </div>
            <div class="col-1">
                <a href="{{route('dashboard.admin')}}" class="btn btn-sm btn-outline-danger"><i
                        class="bi bi-backspace-fill"></i> Kembali</a>
            </div>
        </div>

    </div>
    <div class="container-fluid my-3">
        <table class="table text-center center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kota</th>
                    <th>Jenis Kelamin</th>
                    <th>Kewarganegaraan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPendaftar as $no => $value)
                <tr style="vertical-align: middle;">
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->email }}</td>
                    <td><img src="/foto/{{ $value->foto }}" style="width: 100; height: auto;"></td>
                    <td>{{ $value->jenis_kelamin }}</td>
                    <td>{{ $value->kewarganegaraan }}</td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm"
                            href="{{route('cetak.index', ['id' => $value->id_users])}}"><i
                                class="bi bi-pencil-fill"></i>
                            Lihat Data</a>
                        <a class="btn btn-outline-success btn-sm"
                            href="{{route('dataPendaftar.edit', ['id' => $value->id])}}"><i
                                class="bi bi-pencil-fill"></i> Edit</a>
                        <a class="btn btn-outline-danger btn-sm"
                            href="{{route('dataPendaftar.delete', ['oldid' => $value->id])}}"
                            onclick="return confirm(`Hapus Data Pendaftar {{$value->nama}}`)"><i
                                class="bi bi-trash3-fill"></i>
                            Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@extends('footer')