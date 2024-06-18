<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SiJelantah | Layanan Pengambilan Minyak Jelantah</title>
    <link rel="stylesheet" href="css/LandingPage.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="icon" href="storage/img/tablogo.png" type="image/x-icon">
  </head>

  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
      <div class="container-fluid">
        <a href="/" class="navbar-brand d-flex me-auto">
          <img
            id="img"
            width="60px"
            src="storage/img/logo.png"
            alt="Logo"
            class="mr-2"
          />
          SiJelantah
        </a>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" aria-current="page" href="#home"
                  >BERANDA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#about">TENTANG</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#service">TUJUAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#partners">LAYANAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#contact">KONTAK</a>
              </li>
            </ul>
          </div>
        </div>
        <a href="/Masuk" class="login-button">MASUK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- HOME -->
    <section id="home" class="d-flex">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="display-4 fw-bold">Solusi Limbah Minyak Jelantah</h1>
            <p>
              Kami membantu untuk membersihkan limbah minyak di daerah Sidoarjo
            </p>
            <a href="/Masuk" class="btn-kmp btn-lg">KUMPULKAN</a>
            <a href="/Gabung" class="btn-gbg btn-lg">GABUNG</a>
          </div>
          <div class="col-md-6">
            <img src="storage/img/minyak1.png" alt="minyak" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section
      id="about"
      class="py-5"
      style="
        background-image: url('storage/img/bg-about.png');
        background-size: cover;
        background-position: center;
      "
    >
      <div class="container position-relative text-center text-white">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <img src="storage/img/minyak2.png" alt="minyak" class="img-fluid" />
            <div class="overlay-content">
              <h1 class="display-4">Tentang Kami</h1>
              <p>
                Kami merupakan solusi atas limbah revolusioner untuk pabrik,
                rumah, sekolah, dan perusahaan komersial. Kami sangat ahli
                dibidangnya terLandingPage untuk limbah Jelantah dan Limbah Pabrik
                Kelapa Sawit.
              </p>
              <a href="#" class="lengkap-btn btn-lg">SELENGKAPNYA</a>
            </div>
          </div>
        </div>
      </div>
</section>



    <!-- SERVICE -->
    <section
      id="service"
      class="py-5"
      style="
        background-image: url('storage/img/bg-home.png');
        background-size: cover;
        background-position: center;
      "
    >
      <div class="container text-center">
        <h1 class="display-4 fw-bold">Tujuan Kami</h1>
        <p class="lead fw-medium">
          Kami mengumpulkan Limbah Minyak Jelantah ini bertujuan untuk
        </p>
        <div class="row mt-5">
          <div class="col-md-4">
            <div class="card border-0 bg-white text-dark mb-4">
              <img src="storage/img/recycle.png" class="card-img-top" alt="recycle" id="recycle" />
              <div class="card-body">
                <h5 class="card-title">Biodiesel</h5>
                <p class="card-text">
                  Biodiesel biasanya digunakan sebagai pengganti dari bahan
                  bakar diesel yang tercipta melalui bahan baku minyak bumi.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 bg-white text-dark mb-4">
              <img src="storage/img/world.png" class="card-img-top" alt="world" id="world"/>
              <div class="card-body">
                <h5 class="card-title">Go Green</h5>
                <p class="card-text">
                  Mendukung program Go Green, mendukung penghijauan dengan
                  mendaur ulang minyak Jelantah anda menjadi tenaga yang baik
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 bg-white text-dark mb-4">
              <img src="storage/img/health.png" class="card-img-top" alt="health" id="health"/>
              <div class="card-body">
                <h5 class="card-title">Go Health</h5>
                <p class="card-text">
                  Dengan mengumpulkan limbah, kita mendukung hidup sehat, karena
                  mengurangi limbah yang mencemari lingkungan
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PARTNERS -->
    <section
      id="partners"
      class="py-5"
      style="
        background-image: url('storage/img/bg-partner.png');
        background-size: cover;
        background-position: center;
      "
    >
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card text-dark mb-4">
                <img src="storage/img/minyak5.jpeg" class="card-img-top" alt="recycle" />
                <div class="card-body">
                  <h5 class="card-title">LIMBAH MINYAK SKALA KECIL</h5>
                  <p class="card-text">
                    Minyak jelantah atau used cooking oil (UCO) adalah minyak limbah bekas masak jumlah sedikit
                  </p>
                  <a href="#" class="btn btn-outline-success">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-dark mb-4">
                <img src="storage/img/minyak3.png" height="270px" class="card-img-top" alt="world" />
                <div class="card-body">
                  <h5 class="card-title">LIMBAH MINYAK SKALA BESAR</h5>
                  <p class="card-text">
                    Minyak Sisa dari Proses Memasak Besar atau Large-scale Cooking Oil Processes (LCOP)
                  </p>
                  <a href="#" class="btn btn-outline-success">Learn More</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="row mt-5">
                    <div class="col-12 text-left mt-5">
                      <h1 class="display-4 fw-bold">Layanan Kami</h1>
                      <p class="lead fw-medium">
                        Kami memberikan layanan pengumpulan dan penjemputan minyak untuk mengumpulkan minyak bekas dari berbagai sumber, seperti rumah tangga, restoran, dan industri.
                      </p>
                    </div>
                  </div>
            </div>
          
        </div>
      
    </section>

    <!-- CONTACT -->
    <section id="contact" class="bg-light" style="position: relative;">
        <div class="container">
            <div class="row text-dark">
                <div class="col-md-3">
                  <h1 class="text-success fw-bold">Hubungi Kami</h1>
                </div>
                <div class="col-md-3">
                  <h3>Kontak</h3>
                  <p>
                    Alamat: Kompleks Pergudangan Meiko Abadi C-31 & C-32, Desa Wedi,
                    Sidoarjo, Jawa Timur 61254
                  </p>
                  <p>Telepon: 031-8014663 / 031-8014635</p>
                </div>
                <div class="col-md-3">
                  <h3>Jam Operasional</h3>
                  <ul class="list-unstyled">
                    <li>Senin- Jumat : 08.00-17.00 WIB</li>
                    <li>Sabtu : 08.00-15.00 WIB</li>
                    <li>Minggu : Libur</li>
                  </ul>
                </div>
                <div class="col-md-3">
                  <h3>Mitra</h3>
                  <img src="storage/img/logoartha.png" alt="artha" class="img-fluid d-block" />
                </div>
              </div>
            </div> 
            <div class="footer-bottom">
                <p>&copy; 2024 SiJelantah | Created By Kelompok 8 | All Rights Reserved</p>
            </div>
        </div>
    </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="js/LandingPage.js"></script>
  </body>
</html>
