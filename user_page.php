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
   <title>Halaman Pengguna | Kosan Ciamiz</title>

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
         <div class="row mb-4">
            <a class="nav-link" href="#product">
               <h4>Kos-kosan yang tersedia</h4>
            </a>
         </div>
         <div class="row g-4">
            <?php
            $sql = "SELECT * FROM products";
            $results = mysqli_query($conn, $sql);
            if ($results) {
               while ($row =  mysqli_fetch_assoc($results)) {
                  $namaKos = $row['name'];
                  $hargaKos = $row['price'];
                  echo '<div class="col-md-4">
                  <div class="products-post card-effect">
                     <img src="uploads/' . $row['img'] . '" alt="">
                     <h5 class="mt-4"><a href="#"> ' . $namaKos . '</a></h5>
                     <p>Rp' . $hargaKos . ' / Bulan</p>
                     <a href="desc_product.php?id=' . $row['id'] . '" class="btn btn_blue">See Details</a>
                  </div>
               </div>';
               }
            }
            ?>

         </div>
      </div>
   </section>
   <!-- PRODUCT -->

   <!-- FOOTER -->
   <footer class="footer_b py-4">
      <div class="container">
         <div class="row">
            <p class="mb-0 text-center">Copyright &copy; 2023 Kosan Ciamiz</a></p>
         </div>
      </div>
   </footer>
   <!-- FOOTER -->
</body>

</html>