<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];

if (!isset($_SESSION["Rooms"])) {
    $_SESSION["Rooms"] = [];
}

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
    <style>
        .img-bukti-ngantor {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    </style>
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
        <h1 class="mt-5 mb-3 border-bottom fw-bold">Dashboard</h1>
        <div class="row">
            <div class="col-lg-10">
                <div class="card card-body h-100 justify-content-center">
                    <h4>Selamat datang,</h4>
                    <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                    <p class="mb-0">Kamu sudah login sejak:</p>
                    <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?></p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="card card-body">
                    <p>Bukti sedang ngantor:</p>
                    <img src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>" class="img-fluid rounded img-bukti-ngantor" alt="Bukti ngantor (sudah dihapus)" />
                </div>
            </div>
        </div>
        <div style="padding-top: 5px;">
            <h1 class="mt-5 mb-3 border-bottom fw-bold">Daftar Kamar</h1>
            <p class="mb-0">Grand Atma saat ini memiliki <strong><?php echo count($_SESSION["Rooms"]) ?></strong> jenis kamar yang eksotis </p>
            <button onclick="document.location.href='./addKamar.php'" type="button" name="addKamar" class="btn btn-success">
                <svg width="15px" height="15px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00024000000000000003">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44771 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44772 13 7 12.5523 7 12C7 11.4477 7.44771 11 8 11H11V8Z" fill="#ffffff"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23 4C23 2.34315 21.6569 1 20 1H4C2.34315 1 1 2.34315 1 4V20C1 21.6569 2.34315 23 4 23H20C21.6569 23 23 21.6569 23 20V4ZM21 4C21 3.44772 20.5523 3 20 3H4C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4Z" fill="#ffffff"></path>
                    </g>
                </svg>
                Tambah Kamar
            </button>
        </div>
        <form action="./processDeleteKamar.php" method="POST">
            <?php foreach ($_SESSION["Rooms"] as $key => $room) : ?>
                <div style="padding-top: 20px; padding-bottom: 20px;">
                    <div style="width: 100%; padding: 20px; background-color: ghostwhite; border-radius: 10px; border: solid; border-color: gray;">
                        <div class="d-flex gap-3">
                            <img src="./assets/images/featurette-2.jpeg" class="card-img-top" alt="fotoKamar" style="width: 250px; border-radius: 10px;">
                            <div style="width: 100%;">
                                <h4><?php echo $room['namaKamar'] ?></h4>
                                <p><?php echo $room['Deskripsi'] ?></p>
                                <hr>
                                <div class="d-flex gap-2">
                                    <p>Tipe kamar : <strong><?php echo $room['tipeKamar'] ?></strong></p>
                                    <p>Base price : <strong><?php echo $room['hargaKamar'] ?></strong></p>
                                </div>
                                <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $key ?>">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
    </main>
    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>