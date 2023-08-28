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
<div class="container">
    <h1 class="h2 text-center mt-5">Selamat Datang Admin</h1>
    <form action="{{route('loginAdmin')}}" method="post">
        @csrf
        <div class="text-center text-lg-start m-5 p-4 border" style="border-radius: 20px;">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" autofocus required />
                <label class="form-label" for="email">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
                <label class="form-label" for="password">Password</label>
            </div>

            <div class="d-flex justify-content-between align-items-center my-3">
                <div class="form-check mb-0">
                    <a href="{{route('register')}}" class="text-body">Register?</a>

                </div>
                <a href="#!" class="text-body">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <!-- <input class="btn btn-outline-primary btn-lg" type="submit" value="Memuju Halaman Buku"> -->

        </div>
    </form>
</div>

@extends('footer')