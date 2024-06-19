<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Profil</title>
    <link rel="stylesheet" href="css/ProfilPengguna.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="storage/img/tablogo.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar bg-white p-3">
            <div class="d-flex align-items-center mb-4">
                <div class="logo_content">
                    <img src="storage/img/logo.png" alt="logo" width="20">
                    <div class="logo_name">SiJelantah</div>
                </div>
                <i class='bx bx-menu ms-auto' id="btn"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="/PenggunaPage" class="nav-link">
                        <i class='bx bx-tachometer fs-4'></i>
                        <span class="links_name ms-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/RiwayatPengguna" class="nav-link">
                        <i class='bx bx-receipt fs-4'></i>
                        <span class="links_name ms-2">Riwayat</span>
                    </a>
                </li>
                <li>
                    <a href="/ProfilPengguna" class="nav-link active">
                        <i class='bx bx-user fs-4'></i>
                        <span class="links_name ms-2">Akun</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">           
            <nav class="navbar navbar-expand-lg d-flex px-4 py-2">   
                <div class="container-fluid">
                    <h3 class="mb-3 mt-3"> </h3>
                    <a href="{{ route('logoutuser.submit') }}" class="login-button mb-3 mt-3">Keluar</a>
                </div>  
            </nav>
            <div class="container-fluid-main mx-4 mb-3">
                <div class="form-container row mx-auto">
                    <div class="col-12 col-md-4">
                        <div class="card border-0">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="storage/img/cust.png" class="img-fluid custom-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body py-4">
                                        <h5 class="card-title mb-2 fw-bold">{{session('pengguna')['NAMA']}}</h5>
                                        <p class="mb-2 fw-medium">Pengumpul</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-container row mx-auto mt-4">
                    <form action="{{route('editbaru')}}" method="post">
                        <div class="col-12">
                                {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="NAMA" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="NAMA" id="NAMA" value="{{session('pengguna')['NAMA']}}" class="form-control form-control-lg fs-6 p-2">
                                </div>
                                <div class="mb-3">
                                    <label for="EMAIL" class="form-label">Email</label>
                                    <input type="email" name="EMAIL" id="EMAIL" value="{{session('pengguna')['EMAIL']}}" class="form-control form-control-lg fs-6 p-2">
                                </div>                                 
                                <div class="mb-3">
                                    <label for="ALAMAT" class="form-label">Alamat</label>
                                    <input type="text"  name="ALAMAT" id="ALAMAT" value="{{session('pengguna')['ALAMAT']}}" class="form-control form-control-lg fs-6 p-2">
                                </div>
                                <div class="mb-4">
                                    <label for="NO_TELP" class="form-label">Telepon</label>
                                    <input type="tel" name="NO_TELP" id="NO_TELP" value="{{session('pengguna')['NO_TELP']}}" class="form-control form-control-lg fs-6 p-2">
                                </div>
                            </div>
                        </div>
                        <div class="container mt-2">
                            <div class="form-container d-flex justify-content-center">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-outline-success btn-lg fw-bold"><i class='bx bx-save m-2'></i>Simpan</button>
                                </div>
                            </div>
                        </div>                                                                    
                    </form>
                    <div class="container mt-4">
                        <div class="d-flex justify-content-center">
                            <div class="col-12">
                                <div class="card-service py-4 px-5">
                                    <h5 class="card-title-service mb-1 fw-bold">Tanggal Daftar:</h5>
                                    <h5 class="card-sub-service mb-1 fw-bold">{{session('pengguna')['TGL_DAFTAR']}}</h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/ProfilPengguna.js"></script>
</body>
</html>
