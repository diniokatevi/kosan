<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/css.php"; ?>
    <title>Deskripsi Produk | Kosan Ciamiz</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white d-flex justify-content-around">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/KosanTPI-Dark.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php"><span>Welcome,
                                <?php echo $_SESSION['user_name'] ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <button class="btn btn_blue ms-lg-3" onclick="document.location='logout.php'">Logout</button>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <!-- PRODUCT -->
    <section id="product" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 mx-auto text-center">
                    <h1>Deskripsi kos-kosan</h1>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id ='$id'";

            $gotResuslts = mysqli_query($conn, $sql);

            if ($gotResuslts) {
                if (mysqli_num_rows($gotResuslts) > 0) {
                    while ($row = mysqli_fetch_array($gotResuslts)) {
                        // print_r($row['name']);
            ?>
                        <div class="row g-4">
                            <div class="col">
                                <div class="d-flex flex-column">
                                    <div class="d-flex gap-5">
                                        <div style="flex:0.5;">
                                            <img src="uploads/<?php echo $row['img'] ?>" alt="" style="width: 100%; height:400px">
                                        </div>
                                        <div style="flex:0.5;">
                                            <h5><a href="#"><?php echo $row['name'] ?></a></h5>
                                            <p>Rp<?php echo $row['price'] ?> / Bulan</p>

                                            <h5 class="mt-4"><a href="#">Deskripsi</a></h5>
                                            <p><?php echo $row['desc'] ?></p>

                                            <h5 class="mt-4"><a href="#">Fasilitas</a></h5>
                                            <p><?php echo $row['fasilitas'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button class="btn btn-danger" onclick="document.location='user_page.php'">Batal</button>
                                <?php echo '<a href="invoice.php?id=' . $row['id'] . '" class="btn btn_blue">Pesan</a>' ?>
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>
        </div>
    </section>
    <!-- PRODUCT -->
</body>

</html>