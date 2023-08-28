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
        <h1 class="h2">Form Tambah User Baru</h1>
    </div>
    <div class="container">
        <form action="{{route('dataUser.editProses')}}" method="post">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="{{$data->id}}">
            <input type="hidden" name="id_role" id="id_role" value="{{$data->id_role}}">
            <input type="hidden" name="password" id="password" value="{{$data->password}}">


            <label>Username</label><br>
            <input name="name" class="form-control" type="text" value="{{$data->name}}" required><br>

            <label>Email</label><br>
            <input name=" email" class="form-control" type="email" value="{{$data->email}}" required><br>

            <label>Password</label><br>
            <input name="" class=" form-control" type="password" disabled><br>

            <div class="row my-2">
                <div class="col">
                    <a class="btn btn-outline-danger" href="{{route('dataUser.index')}}" style="width: 80px;">Back</a>
                    <input class="btn btn-outline-primary" type="submit" value="Save" style="width: 80px;">
                </div>
            </div>
        </form>
    </div>

</div>

@extends('footer')