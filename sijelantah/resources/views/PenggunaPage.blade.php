<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Dashboard</title>
    <link rel="stylesheet" href="css/Pengguna.css">
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
                    <a href="/PenggunaPage" class="nav-link active">
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
                    <a href="/ProfilPengguna" class="nav-link">
                        <i class='bx bx-user fs-4'></i>
                        <span class="links_name ms-2">Akun</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">           
            <nav class="navbar navbar-expand-lg d-flex px-4 py-2">   
                <div class="container-fluid">
                    {{-- <h3 class="mb-3 mt-3">Halo, {{Session::get('pengguna')['NAMA']}}</h3> --}}
                    <h3 class="mb-3 mt-3">Halo, {{session('pengguna')['NAMA']}}</h3>
                    <a href="{{ route('logoutuser.submit') }}" class="login-button mb-3 mt-3">Keluar</a>
                </div>  
            </nav>
            <main class="content px-3 mt-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="row g-0">
                                                <div class="col-md-4 img-container">
                                                    <img src="storage/img/cust.png" class="img-fluid custom-img" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body py-2">
                                                        <h5 class="card-title mt-2 mb-1">Pengumpul</h5>
                                                        {{-- <p class="mb-2">{{Session::get('pengguna')['NAMA']}}</p> --}}
                                                        <p class="mb-2">{{session('pengguna')['NAMA']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                             
                                    <div class="col-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="row g-0">
                                                <div class="col-md-4 img-container">
                                                    <img src="storage/img/oil.png" class="img-fluid custom-img" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body py-4">
                                                        <h5 class="card-title">Total Minyak</h5>
                                                        <p class="mb-2">{{ number_format($total_minyak, 0, ',', '.') }} Liter</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="row g-0">
                                                <div class="col-md-4 img-container">
                                                    <img src="storage/img/pengambilan.png" class="img-fluid custom-img" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body py-4">
                                                        <h5 class="card-title">Total Insentif</h5>
                                                        <p class="mb-2">Rp{{ number_format($total_uang, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="container">
                                <div class="form-container row mx-auto p-4">
            
                                    <h4 class="form-tittle mb-4">Mari Kumpulkan!</h4>
                                    <div class="container">
                                        <form action="{{ route('permintaan.buat_permintaan') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" name="ALAMAT_PERMINTAAN" id="alamat" class="form-control form-control-lg fs-6 p-2">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="Jumlah" class="form-label">Jumlah</label>
                                                        <div class="input-group mt-1 mb-3">
                                                            <input type="number" name="JUMLAH_KIRIM" id="number" class="form-control form-control-lg fs-6">
                                                            <span class="input-group-text">
                                                                <p class="unit-text">Liter</p>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- start kategori --}}
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <h6 class="tittle">Pilih Service</h6>
                                                        <div class="card-container p-4">
                                                            <div class="card service border-0 mt-3 mb-4">
                                                                <div class="row g-0 align-items-center">
                                                                    <div class="col-2 col-md-2 d-flex align-items-center">
                                                                        <input type="radio" name="KATEGORI" value="Pribadi" class="kategori-radio" id="home">
                                                                        <img src="storage/img/ser2.png" class="img-fluid service-img" alt="">
                                                                    </div>
                                                                    <div class="col-10 col-md-8 ms-2 ms-md-4">
                                                                        <div class="card-service py-2">
                                                                            <h5 class="card-tittle-service mb-1">USED COOKING OIL COLLECTOR</h5>
                                                                            <p class="mb-1">Kolektor Minyak Goreng Bekas</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card service border-0 mt-3 mb-2">
                                                                <div class="row g-0 align-items-center">
                                                                    <div class="col-2 col-md-2 d-flex align-items-center">
                                                                        <input type="radio" name="KATEGORI" value="Restoran" class="kategori-radio" id="resto">
                                                                        <img src="storage/img/ser1.png" class="img-fluid service-img" alt="">
                                                                    </div>
                                                                    <div class="col-10 col-md-8 ms-5 ms-md-4">
                                                                        <div class="card-service py-2">
                                                                            <h5 class="card-tittle-service mb-1">RESTAURANT USED COOKING OIL</h5>
                                                                            <p class="mb-1">Minyak Sisa Penggunaan Restoran</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                                {{-- end kategori --}}
                                            </div>
                                            <div class="btn-container mt-3">
                                                <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">Kumpulkan</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/Pengguna.js"></script>
</body>
</html>
