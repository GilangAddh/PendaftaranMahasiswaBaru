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
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid p-5 py-0">
        <a class="navbar-brand" href="#">
            <img src="https://th.bing.com/th/id/OIP.cBn4jPWclmK_doErPOqNoQHaHh?pid=ImgDet&rs=1" alt="" width="60" height="60">
        </a>
        <form action="{{route('logout')}}" method="post" class="pt-3">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</nav>
<div class="container  text-primary">

    <div class="container-fluid border rounded-3 my-5 py-5 border-secondary">

        <div class="container-fluid my-3">
            <div class="row offset-2">
                <div class="col-4 m-3 p-5 border border-primary rounded-3">
                    <div class="row">
                        <a href="{{route('form.index')}}" class="btn btn-outline-primary">Daftar</a>
                    </div>
                    <div class="row mt-3">
                        <h3 class="h5 text-center text-primary">Form Pendaftaran Mahasiswa Baru</h3>
                    </div>
                </div>
                <div class="col-4 m-3 p-5 border border-success rounded-3">
                    <div class="row">
                        <a href="{{route('cetak.index', ['id' => auth()->user()->id])}}" class="btn btn-outline-success">Data
                            Pendaftaran</a>
                    </div>
                    <div class="row mt-3">
                        <h3 class="h5 text-center text-success">Data Pendaftaran Anda</h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@extends('footer')