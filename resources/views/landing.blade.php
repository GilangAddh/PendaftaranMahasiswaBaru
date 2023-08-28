<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/app.css">
    <style>
        /* Add custom styles here */
        body {
            background: url('https://blog.static.mamikos.com/wp-content/uploads/2020/05/politeknik-negeri-jakarta.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .landing {
            padding: 100px 0;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 50px auto;
            max-width: 800px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-7">
                <section class="landing py-5">
                    <div class="embed-responsive">
                        <h2 class="h2">Politeknik Negeri Jakarta</h2>
                        <video class="embed-responsive-item" width="512" height="288" controls>
                            <source src="assets/VideoHome.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </section>
                <section class="landing p-4">
                    <h2 class="h2 text-secondary pb-2">SPIRIT Politeknik Negeri Jakarta</h2>
                    <img src="assets/ImageHome.jpg" class="img-fluid" alt="SPIRIT Politeknik Negeri Jakarta">
                </section>
            </div>
            <div class="col">
                <section class="landing">
                    <div class="container my-5">
                        <h1>Selamat Datang Peserta Didik Baru</h1>
                        <p>Silahkan melakukan registrasi akun untuk melakukan pendaftaran</p>
                        <a href="{{route('register.index')}}" class="btn btn-outline-primary">Register</a>
                    </div>
                </section>
                <section class="landing">
                    <div class="container my-5">
                        <h2>Sudah Memiliki Akun?</h2>
                        <p>Silahkan menuju ke halaman login</p>
                        <a href="{{route('register.login')}}" class="btn btn-outline-success">Login</a>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>