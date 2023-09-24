<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Tambah Kamar",
    "logo" => "./assets/images/crown.png"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $detail["page_title"]; ?></title>
    <!-- icon tab -->
    <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon" />
    <!-- Bootstrap 5.3 css -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <!-- poppins dari google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./assets/css/poppins.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <header class="fixed-top scrolled" id="navbar">
        <nav class="container nav-top py-2">
            <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                <img src="<?php echo $detail["logo"]; ?>" class="crown-logo" />
                <div>
                    <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                    <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                </div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Panel</a></li>
                <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main style="padding-top: 84px;" class="container">
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Kamar</h1>
        <form action="./processAdd.php" method="POST" id="formKamar" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="inputKamar" class="col-sm-2 col-form-label">Nama Kamar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputKamar" name="namaKamar" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="Deskripsi" id="inputDeskripsi" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputTipe" class="col-sm-2 col-form-label">Tipe Kamar</label>
                <div class="col-sm-10">
                    <select class="form-select" id="inputTipe" name="tipeKamar" required>
                        <option selected disabled hidden value="">Pilih Tipe Kamar</option>
                        <option value="Standard">Standard</option>
                        <option value="Superior">Superior</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputHarga" class="col-sm-2 col-form-label">Harga Kamar</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputHarga" name="hargaKamar" required>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="saveRoom"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff;
                                padding-bottom: 2px;
                            }
                        </style>
                        <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg></i> Simpan
                </button>
            </div>
        </form>
    </main>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>