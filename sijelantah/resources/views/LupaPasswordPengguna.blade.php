<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiJelantah | Masuk Akun</title>
    <link rel="stylesheet" href="css/LupaPass.css">
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
        <div class="col-12">
            <div class="row align-items-center justify-content-center h-100 g-0 px-5 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6 text-center">

                    <a href="#" class="d-flex justify-content-center mb-4"></a>

                    <div class="text-center">
                        <h3 class="fw-bold">Lupa Password</h3>
                        <p class="text-dark">Cari akun anda</p>
                    </div>

                    
                    <form method="POST" action="{{ route('process-forgot-password') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="USERNAME" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
