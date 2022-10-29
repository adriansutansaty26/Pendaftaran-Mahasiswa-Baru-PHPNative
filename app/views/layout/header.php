<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMB Universitas Sriwijaya</title>
    <script src="https://kit.fontawesome.com/1f1f3296d9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/unsri2.png" height="35px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Halaman Utama</a>
                    </li>
                    <?php if (authElementShow(0)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?camaba=dasbor">Dasbor Camaba</a>
                        </li>
                    <?php } ?>
                    <?php if (authElementShow(1)) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?admin=daftar_maba">Daftar Camaba</a></li>
                                <li><a class="dropdown-item" href="index.php?admin=daftar_fakultas">Daftar Fakultas</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (authElementShow(0) || authElementShow(1)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="app/views/logout.php">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">