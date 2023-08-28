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
        <h1 class="h2">Data User</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-1">
                <a href="{{route('dataUser.tambah')}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus-square-fill"></i>
                    Tambah</a>
            </div>
            <div class="col-1">
                <a href="{{route('dataPendaftar.index')}}" class="btn btn-sm btn-outline-success"><i class="bi bi-book-fill"></i>
                    Data Pendaftar</a>
            </div>
            <div class="col-1">
                <a href="{{route('dashboard.admin')}}" class="btn btn-sm btn-outline-danger"><i class="bi bi-backspace-fill"></i> Kembali</a>
            </div>
        </div>

    </div>
    <div class="container-fluid my-3">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $no => $value)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>
                        <a class="btn btn-outline-success btn-sm" href="{{route('dataUser.edit', ['oldid' => $value->id])}}"><i class="bi bi-pencil-fill"></i>
                            Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="{{route('dataUser.delete', ['oldid' => $value->id])}}" onclick="return confirm(`Hapus Data User {{$value->name}}`)"><i class="bi bi-trash3-fill"></i>
                            Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@extends('footer')