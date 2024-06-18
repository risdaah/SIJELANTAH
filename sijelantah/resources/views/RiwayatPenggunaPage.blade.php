<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Riwayat</title>
    <link rel="stylesheet" href="css/RiwayatPengguna.css">
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
                    <a href="/RiwayatPengguna" class="nav-link active">
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
                    <h3 class="mb-3 mt-3">Halo, {{$nama}}</h3>
                    <a href="{{ route('logoutuser.submit') }}" class="login-button mb-3 mt-3">Keluar</a>
                </div>  
            </nav>

                            <div class="container">
                                <div class="table-container row mx-auto p-5">
                                    <h4 class="table-tittle mb-4">Riwayat Pengumpulan</h4>
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 75px;">No</th>
                                                <th scope="col">Jumlah (Liter)</th>
                                                <th scope="col">Tanggal Permintaan</th>
                                                <th scope="col">Tanggal Pengumpulan</th>  
                                                <th scope="col" style="width: 200px;">Status</th>                                           
                                                <th scope="col">Insentif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($permintaan) && $permintaan->isNotEmpty())
                                                @foreach($permintaan as $index => $item)
                                                    <tr>
                                                        <td>{{ $permintaan->firstItem() + $index }}</td> <!-- Penomoran yang disesuaikan dengan pagination -->
                                                        <td>{{ $item->JUMLAH_KIRIM ?? 'N/A' }}</td>
                                                        <td>{{ $item->TGL_MINTA ?? 'N/A' }}</td>
                                                        <td>{{ $item->TGL_KUMPUL ?? 'N/A' }}</td>
                                                        <td>
                                                            @if($item->STATUS_PERMINTAAN == 'Ditolak')
                                                                <b class="text-danger">Ditolak</b>
                                                            @else
                                                                {{ $item->STATUS_PERMINTAAN ?? 'N/A' }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($item->STATUS_PERMINTAAN == 'Ditolak')
                                                                <b class="text-danger">{{ $item->JUMLAH_INSENTIF ? 'Rp' . number_format($item->JUMLAH_INSENTIF, 2, ',', '.') : 'N/A' }}</b>
                                                            @else
                                                                {{ $item->JUMLAH_INSENTIF ? 'Rp' . number_format($item->JUMLAH_INSENTIF, 2, ',', '.') : 'N/A' }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">Tidak ada riwayat permintaan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>    
                                    
                                    
                                    
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            Menampilkan {{ $permintaan->firstItem() }} - {{ $permintaan->lastItem() }} dari {{ $permintaan->total() }} data
                                        </div>
                                        <div>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end">
                                                    {{ $permintaan->links('vendor.pagination.bootstrap-4-green') }}
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
    <script src="js/RiwayatPengguna.js"></script>
</body>
</html>
