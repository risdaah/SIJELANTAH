<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Laporan Minyak</title>
    <link rel="stylesheet" href="css/Laporan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/tablogo.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

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
                <a href="/RiwayatAdmin" class="nav-link">
                    <i class='bx bx-file fs-4'></i>
                    <span class="links_name ms-2">Riwayat</span>
                </a>
            </li>
            <li>
                <a href="/LaporanPage" class="nav-link active">
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
                            <div class="container chart-container p-5">
                                <div class="row mb-4 d-flex justify-content-center">
                                    <div class="col-md-5 cust-bar p-4">
                                        <h4 class="fw-bold">Top Pengumpul</h4>
                                        <canvas id="pieChart" width="500" height="300"></canvas>
                                    </div>
                                    <div class="col-md-5 cust-pie p-4">
                                        <h4 class="fw-bold">Total Pengambilan Minyak</h4>
                                        <!-- Dropdown untuk memilih tahun -->
                                        <form method="GET" action="{{ route('laporan.page') }}">
                                            <div class="mb-3">
                                                <label for="year" class="form-label">Select Year:</label>
                                                <select class="text-success bg-light mx-2 px-2 rounded-pill" id="year" name="year" onchange="this.form.submit()">
                                                    @foreach ($availableYears as $availableYear)
                                                    <option value="{{ $availableYear }}" {{ $availableYear == $yearForChart ? 'selected' : '' }}>
                                                    {{ $availableYear }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>                                        
                                        <canvas id="myChart" width="200" height="100"></canvas>
                                    </div>
                                </div>

                                <!-- Konten tabel -->
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-11 oil-bar p-4">
                                        <h4 class="fw-bold">Laporan Pengumpulan Minyak</h4>
                                        <div class="d-flex flex-column align-items-end mb-3">
                                            <h4 class="mb-2 fs-3 text-danger fw-bold mt-3">Cetak PDF</h4>
                                            {{-- start cetak pdf bulanan --}}
                                            <form action="{{ route('pdf.generate') }}" method="GET">
                                                <label for="month">Pilih Bulan:</label>
                                                <select class="text-success bg-light mx-2 px-2 rounded-pill" name="month" id="month">
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">{{ Carbon\Carbon::createFromFormat('m', $i)->format('F') }}</option>
                                                    @endfor 
                                                </select>
                                
                                                <label for="year">Pilih Tahun:</label>
                                                <select class="text-success bg-light mx-2 px-2 rounded-pill" name="year" id="year">
                                                    @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>  
                                                <button type="submit" class="btn btn-danger"><i class='bx bx-printer'></i> Bulanan (PDF)</button>
                                            </form>
                                            {{-- end cetak pdf bulanan --}}

                                            {{-- start cetak pdf all --}}
                                            <div class="row">
                                                <div class="d-flex gap-2 mt-3">                                         
                                                    <a href="{{ route('pdf.generate') }}" class="btn btn-danger"><i class='bx bx-printer'></i> Keseluruhan (PDF)</a>
                                                </div>
                                            </div>
                                            {{-- end cetak pdf all --}}

                                            {{-- start cetak excel bulanan --}}
                                            <h4 class="mb-2 fs-3 text-success fw-bold">Cetak EXCEL</h4>
                                            <form method="GET" action="/generate-excel">
                                                <label for="month">Pilih Bulan:</label>
                                                <select class="text-success bg-light mx-2 px-2 rounded-pill" name="month" id="month">
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">{{ \Carbon\Carbon::createFromFormat('m', $i)->format('F') }}</option>
                                                    @endfor 
                                                </select>
                                            
                                                <label for="year">Pilih Tahun:</label>
                                                <select class="text-success bg-light mx-2 px-2 rounded-pill" name="year" id="year">
                                                    @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor 
                                                </select>   
                                                <button type="submit" class="btn btn-success"><i class='bx bx-printer'></i> Bulanan (EXCEL)</button>    
                                            </form>
                                            {{-- end cetak excel bulanan --}}

                                            {{-- start cetak excel all --}}
                                            <div class="row">
                                                <div class="d-flex gap-2 mt-3 mb-5">
                                                    <a href="{{ route('export.excel') }}" class="btn btn-success"><i class='bx bx-printer'></i> Keseluruhan (Excel)</a>
                                                </div>
                                            </div>
                                            {{-- end cetak excel all --}}

                                    <!-- Tabel -->
                                    <table class="table text-center table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Customer</th>
                                                <th scope="col">Tanggal Pengumpulan</th>
                                                <th scope="col">Telp</th>
                                                <th scope="col" style="width: 350px">Alamat</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Insentif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($laporanPengumpulan) > 0)
                                                @foreach($laporanPengumpulan as $index => $pengumpulan)
                                                    <tr>
                                                        <td>{{ ($laporanPengumpulan->currentPage() - 1) * $laporanPengumpulan->perPage() + $index + 1 }}</td>
                                                        <td>{{ $pengumpulan['NAMA'] ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['TGL_KUMPUL'] ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['NO_TELP'] ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['ALAMAT_PERMINTAAN'] ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['JUMLAH_KIRIM'] }} Liter</td>
                                                        <td>{{ $pengumpulan['JUMLAH_INSENTIF'] ? 'Rp ' . number_format($pengumpulan['JUMLAH_INSENTIF'], 0, ',', '.') : 'N/A' }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data yang tersedia</td>
                                                </tr>
                                            @endif 
                                        </tbody>
                                    </table>

                                        <!-- Pagination -->
                                        <!-- {{-- {{ $laporanPengumpulan->links() }} --}} -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                Menampilkan {{ $laporanPengumpulan->firstItem() }} - {{ $laporanPengumpulan->lastItem() }} dari {{ $laporanPengumpulan->total() }}  
                                            </div>
                                            <div>
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination justify-content-end ms-4">
                                                        {{ $laporanPengumpulan->links('vendor.pagination.bootstrap-4-green') }} 
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
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

<script>
    // Chart Pengambilan Minyak
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var labels = {!! json_encode($labels) !!};
        var data = {!! json_encode($data) !!};

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Minyak (Liter)',
                    data: data,
                    backgroundColor: '#51AC82',
                    borderColor: '#51AC82',
                    borderWidth: 1,
                    barThickness: 20
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                    
                }
            }
        });
    });


    //Chart Loyal Customer
    // Ambil data yang dikirimkan dari controller
    var userLabels = {!! json_encode($userLabels) !!};
    var userData = {!! json_encode($userData) !!};

    // Inisialisasi pie chart untuk data pengguna
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: userLabels,
            datasets: [{
                label: 'Frekuensi Permintaan',
                data: userData,
                backgroundColor: [
                    '#F7C604',
                    '#00AC4F',
                    '#CAEAC7',
                    '#355B3E',
                    '#DFCF8F',
                ],
                borderColor: [
                    '#F7C604',
                    '#00AC4F',
                    '#CAEAC7',
                    '#355B3E',
                    '#DFCF8F',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2);
                        }
                    }
                }
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.querySelector(".sidebar");
        const closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", function() {
            sidebar.classList.toggle("active");
        });
    });
</script>
</body>
</html>