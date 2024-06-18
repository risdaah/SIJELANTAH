<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Dashboard Admin</title>
    <link rel="stylesheet" href="css/AdminPage.css">
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
                    <a href="/AdminPage" class="nav-link active">
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
                            {{-- start konten atas dashboard --}}
                            <div class="container">
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
                                                            <div class="card-body py-4">
                                                                <h5 class="card-title">Total Anggota</h5>
                                                                <p class="mb-2">{{ number_format($total_pengguna, 0, ',', '.') }}</p>
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
                                                                <p class="mb-2">Rp{{ number_format($total_insentif, 0, ',', '.') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                </div>
                            {{-- end konten atas dashboard --}}
                            <div class="container">
                                <div class="table-container row mx-auto p-5">
                                    <h4 class="table-tittle mb-2">Pengumpulan Minyak</h4>
                                    <h5 class="table-sub mb-4">Daftar Permintaan Pengumpulan yang Perlu di Tangani</h5>
                                    <table class="table text-center table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 75px;">No</th>
                                                <th scope="col" style="width: 275px;">Nama Customer</th>
                                                <th scope="col" style="width: 150px;">Tanggal Pengumpulan</th>
                                                <th scope="col" style="width: 225px;">Telp</th>
                                                <th scope="col" style="width: 400px;">Alamat</th>
                                                <th scope="col" style="width: 200px;">Jumlah</th>
                                                <th scope="col" style="width: 200px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!empty($dataPengumpulan))
                                                @foreach($dataPengumpulan as $index => $pengumpulan)
                                                    <tr>
                                                        <td>{{ $dataPengumpulan->firstItem() + $index }}</td> <!-- Nomor urut dengan penyesuaian pagination -->
                                                        <td>{{ $pengumpulan->permintaan->pengguna->NAMA ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['TGL_KUMPUL'] }}</td>
                                                        <td>{{ $pengumpulan->permintaan->pengguna->NO_TELP ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan->permintaan->ALAMAT_PERMINTAAN ?? 'N/A' }}</td>
                                                        <td>{{ $pengumpulan['JUMLAH_KIRIM'] }} Liter</td>
                                                        <td>
                                                            @if ($pengumpulan->STATUS_PERMINTAAN == "Disetujui")
                                                                <form action="{{ route('StatusPengumpulan', $pengumpulan->ID_KUMPUL) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-outline-success">Disetujui</button>
                                                                </form>
                                                            @elseif ($pengumpulan->STATUS_PERMINTAAN == "Ditolak")
                                                                <form action="{{ route('StatusPengumpulanTolak', $pengumpulan->ID_KUMPUL) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-outline-danger">Ditolak</button>
                                                                </form>
                                                            @elseif ($pengumpulan->STATUS_PERMINTAAN == "Menunggu")
                                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#statusModal"
                                                                        data-url="{{ route('StatusPengumpulan', $pengumpulan->ID_KUMPUL) }}" data-id="{{ $pengumpulan->ID_KUMPUL }}">
                                                                    Menunggu
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            Menampilkan {{ $dataPengumpulan->firstItem() }} - {{ $dataPengumpulan->lastItem() }} dari {{ $dataPengumpulan->total() }} data
                                        </div>
                                        <div>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end">
                                                    {{ $dataPengumpulan->links('vendor.pagination.bootstrap-4-green') }}
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


    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Proses Pengumpulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Setujui atau Tolak Permintaan Pengumpulan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="approveButton">Disetujui</button>
                    <button type="button" class="btn btn-danger" id="rejectButton">Tolak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script src="js/AdminPage.js"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.querySelector(".sidebar");
            const closeBtn = document.querySelector("#btn");

            closeBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    var approveButton = document.getElementById('approveButton');
    var rejectButton = document.getElementById('rejectButton');
    var statusModal = document.getElementById('statusModal');

    var pengumpulanId;
    var url;

    if (statusModal) {
        statusModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            pengumpulanId = button.getAttribute('data-id');
            url = button.getAttribute('data-url');
        });
    }

    if (approveButton) {
        approveButton.addEventListener('click', function() {
            updateStatus('Disetujui');
        });
    }

    if (rejectButton) {
        rejectButton.addEventListener('click', function() {
            updateStatus('Ditolak');
        });
    }

    function updateStatus(status) {
        if (!url || !pengumpulanId) {
            alert('Tidak dapat mengambil data pengumpulan');
            return;
        }
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); 
    })
        .then(data => {
        if (data.success) {
            window.location.href = '/AdminPage'; 
            //alert('Status berhasil diubah');
        } else {
            alert('Gagal memperbarui status');
        }
    })

    }
});

    </script>
</body>
</html>