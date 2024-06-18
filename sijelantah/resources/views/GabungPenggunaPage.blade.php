<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Buat Akun</title>
    <link rel="stylesheet" href="css/Gabung.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="storage/img/tablogo.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
        <div class="container-fluid">
            <div class="navbar-brand d-flex me-auto">
                <img
                  id="img"
                  src="storage/img/logo.png"
                  alt="Logo"
                  class="mr-2"
                />          
                <a href="/">SiJelantah</a>
            </div>
    </nav>
    <div class="row vh-100 g-0">
        <div class="col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6 text-center">

                    <a href="#" class="d-flex justify-content-center mb-4">
                    </a>
                    <div class="text-center">
                        <h3 class="fw-bold">Halo!</h3>
                        <p class="text-dark">Buatlah akun anda</p>
                    </div>

                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="text" name="NAMA" class="form-control form-control-lg fs-6" placeholder="Nama">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="text" name="USERNAME" class="form-control form-control-lg fs-6" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-phone'></i>
                            </span>
                            <input type="tel" name="NO_TELP" class="form-control form-control-lg fs-6" placeholder="Telepon">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-envelope'></i>
                            </span>
                            <input type="email" name="EMAIL" class="form-control form-control-lg fs-6" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt' ></i>
                            </span>
                            <input type="password" name="PASSWORD" class="form-control form-control-lg fs-6" placeholder="Kata Sandi">
                        </div>
                        {{-- <div>
                            <div class="input-group mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck">
                                    <label for="formCheck" class="form-check-label text-dark fw-medium"><small>Simpan Info Saya</small></label>
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-success btn-lg w-100 mb-3 fw-bold">Gabung</button>
                    </form>

                    <div class="text-center">
                        <small>Sudah punya akun? <a href="/Masuk" class="text-success fw-bold">Masuk</a></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image: url('storage/img/minyak7.png');"></div>
        </div>
    </div>
</body>
</html>