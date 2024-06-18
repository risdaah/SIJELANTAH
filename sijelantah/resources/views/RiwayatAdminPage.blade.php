<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Riwayat</title>
    <link rel="stylesheet" href="css/RiwayatAdmin.css">
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
                    <a href="/AdminPage" class="nav-link">
                        <i class='bx bx-tachometer fs-4'></i>
                        <span class="links_name ms-2">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/CustomerPage" class="nav-link">
                        <i class='bx bx-face fs-4'></i>
                        <span class="links_name ms-2">Anggota</span>
                    </a>
                </li>
                <li>
                    <a href="/RiwayatAdmin" class="nav-link active">
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
                                    <h4 class="table-tittle mb-2">Riwayat</h4>
                                    <h5 class="table-sub mb-4">Riwayat Pengumpulan</h5>
                                    <table class="table text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Tanggal Kumpul</th>                                            
                                            <th scope="col">Jumlah Minyak</th> 
                                            <th scope="col">Status</th>                                               
                                            <th scope="col">Insentif</th>    
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($data))
                                                @foreach($data as $index => $pengumpulan)
                                                <tr>
                                                    <td>{{ $data->firstItem() + $index }}</td>
                                                    <td>{{ $pengumpulan->permintaan->pengguna->NAMA ?? 'N/A' }}</td>
                                                    <td>{{ $pengumpulan->permintaan->ALAMAT_PERMINTAAN ?? 'N/A' }}</td> 
                                                    <td>{{ $pengumpulan['TGL_KUMPUL'] }}</td> 
                                                    <td>{{ $pengumpulan['JUMLAH_KIRIM'] . ' Liter' }}</td>
                                                    <td>
                                                        @if ($pengumpulan->STATUS_PERMINTAAN == "Disetujui")
                                                            <b class="text-success">Disetujui</b>
                                                        @elseif ($pengumpulan->STATUS_PERMINTAAN == "Ditolak")
                                                            <b class="text-danger">Ditolak</b>
                                                        @elseif ($pengumpulan->STATUS_PERMINTAAN == "Menunggu")
                                                            <b class="text-secondary">Menunggu</b>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($pengumpulan->STATUS_PERMINTAAN == "Disetujui")
                                                            <b class="text-success">
                                                                {{ isset($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF) ? 'Rp' . number_format($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF, 0, ',', '.') : 'N/A' }}
                                                            </b>
                                                        @elseif ($pengumpulan->STATUS_PERMINTAAN == "Ditolak")
                                                            <b class="text-danger">
                                                                {{ isset($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF) ? 'Rp' . number_format($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF, 0, ',', '.') : 'N/A' }}
                                                            </b>
                                                        @elseif ($pengumpulan->STATUS_PERMINTAAN == "Menunggu")
                                                            <b class="text-secondary">
                                                                {{ isset($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF) ? 'Rp' . number_format($pengumpulan->permintaan->insentif->JUMLAH_INSENTIF, 0, ',', '.') : 'N/A' }}
                                                            </b>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        
                                    </table>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }} dari {{ $data->total() }} data
                                        </div>
                                        <div>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end">
                                                    {{ $data->links('vendor.pagination.bootstrap-4-green') }}
                                                </ul>
                                            </nav>
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
    <script src="js/RiwayatAdmin.js"></script>
</body>
</html>
