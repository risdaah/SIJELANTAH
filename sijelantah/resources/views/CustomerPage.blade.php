<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Daftar Anggota</title>
    <link rel="stylesheet" href="css/Customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="storage/img/tablogo.png" type="image/x-icon">
        <!-- set up font awesome -->
        <script src="https://kit.fontawesome.com/1009267a41.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <a href="/AdminPage" class="nav-link">
                        <i class='bx bx-tachometer fs-4'></i>
                        <span class="links_name ms-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/CustomerPage" class="nav-link active">
                        <i class='bx bx-face fs-4'></i>
                        <span class="links_name ms-2">Anggota</span>
                    </a>
                </li>
                <li>
                    <a href="/RiwayatAdmin" class="nav-link">
                        <i class='bx bx-file fs-4'></i>
                        <span class="links_name ms-2">Riwayat</span>
                    </a>
                </li>
                <li>
                    <a href="/LaporanPage" class="nav-link">
                        <i class='bx bx-bar-chart-alt-2 fs-4'></i>
                        <span class="links_name ms-2">Laporan</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">           
            <nav class="navbar navbar-expand-lg d-flex px-4 py-2">   
                <div class="container-fluid">
                    <h3 class="mb-3 mt-3">Halo, Admin</h3>
                    <a href="{{ route('logoutuser.submit') }}" class="login-button mb-3 mt-3">Keluar</a>
                </div>  
            </nav>

            <main class="content px-3 mt-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="row">
                            <div class="container">
                                <div class="table-container row mx-auto p-5">
                                    <h4 class="table-tittle mb-2">Semua Anggota</h4>
                                    <h5 class="table-sub mb-4">Anggota Aktif</h5>
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 75px;">No</th>
                                                <th scope="col" style="width: 275px;">Nama Customer</th>
                                                <th scope="col" style="width: 275px;">Email</th>
                                                <th scope="col" style="width: 225px;">Telp</th>
                                                <th scope="col" >Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($dataCust))
                                                @foreach($dataCust as $index => $cust)
                                                <tr>
                                                    <td>{{ $dataCust->firstItem() + $index }}</td>
                                                    <td>{{ $cust['NAMA'] }}</td>
                                                    <td>{{ $cust['EMAIL'] }}</td>
                                                    <td>{{ $cust['NO_TELP'] }}</td>
                                                    <td>{{ $cust['ALAMAT'] }}</td> 
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        Menampilkan {{ $dataCust->firstItem() }} - {{ $dataCust->lastItem() }} dari {{ $dataCust->total() }} data
                                    </div>
                                    <div>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
                                                {{ $dataCust->links('vendor.pagination.bootstrap-4-green') }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                </div> 
                                @if(!empty($success))
                                    <div class="alert alert-success">
                                        {{ $success }}
                                    </div>
                                @endif                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/Customer.js"></script>
</body>
</html>
