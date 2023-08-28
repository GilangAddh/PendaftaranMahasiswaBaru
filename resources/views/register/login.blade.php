@extends('head')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
    <div class="">{{ Session::get('alert-' . $msg) }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
<div class="container">
    <section class=" vh-100 bg-light my-5 rounded-3">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-outline-primary btn-floating mx-1">
                                <i class="bi bi-google"></i>
                            </button>

                            <button type="button" class="btn btn-outline-primary btn-floating mx-1">
                                <i class="bi bi-github"></i>
                            </button>

                            <button type="button" class="btn btn-outline-primary btn-floating mx-1">
                                <i class="bi bi-microsoft"></i>
                            </button>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                    placeholder="Enter a valid email address" autofocus required />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Enter password" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center my-3">
                                <div class="form-check mb-0">
                                    <a href="{{route('register')}}" class="text-body">Register?</a>

                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <!-- <input class="btn btn-outline-primary btn-lg" type="submit" value="Memuju Halaman Buku"> -->

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

@extends('footer')