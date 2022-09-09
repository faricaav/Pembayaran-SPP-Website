<!--
=========================================================
* Material Kit 2 - v3.0.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
  session_start();
  if(!isset($_SESSION["username"])){
  header("Location: ../../choose.php");
  exit(); }
?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../template/template 2/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../template/template/assets/img/logo smk telkom malang.png">
  <title>
    WEBSITE | SPP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../../template/template 2/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../template/template 2/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../template/template 2/assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="blog-author bg-gray-200">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        PEMBAYARAN SPP
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <li class="nav-item dropdown dropdown-hover mx-2">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="material-icons opacity-6 me-2 text-md">article</i>
              Cek Data
              <img src="../../template/template 2/assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-2 d-lg-block d-none">
              <img src="../../template/template 2/assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-2 d-lg-none d-block">
            </a>
            <ul class="dropdown-menu dropdown-menu-animation dropdown-menu-end dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg" aria-labelledby="dropdownMenuDocs">
              <div class="d-none d-lg-block">
                <ul class="list-group">
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="tagihan.php">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Tagihan SPP</h6>
                    </a>
                  </li>
                  <li class="nav-item list-group-item border-0 p-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="histori.php">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Histori Pembayaran</h6>
                    </a>
                  </li>
                </ul>
            </ul>
          </li>
          <li class="nav-item my-auto ms-3 ms-lg-0">
            <a class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">SMK TELKOM MALANG</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
  <header>
    <div class="page-header min-height-400" style="background-image: url('../../template/template/assets/img/smk telkom.jpg');" loading="lazy">
      <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
  </header>
  <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
  <?php
    include "../koneksi.php";
    $qry=mysqli_query($conn,"SELECT * FROM siswa JOIN spp ON siswa.id_spp=spp.id_spp JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='".$_SESSION['nisn']."'");
    $no=0;
    while($q=mysqli_fetch_array($qry)){
      $no++;
  ?>
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-2 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../../template/template/assets/img/user 2.png" loading="lazy">
            </div>
            <div class="row py-5">
              <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0"><?php echo $q['nama']; ?></h3>
                  <div class="d-block">
                    <a href="../../logout.php" class="btn btn-sm btn-outline-info text-nowrap mb-0">Logout</a>
                  </div>
                </div>
                <p class="text-lg mb-0">
                  <h6>Kelas : <?php echo $q['nama_kelas']?> <?php echo $q['kompetensi_keahlian']?></h6>
                  <h6>Alamat : <?php echo $q['alamat']?></h6>
                  <h6>No. Telp : <?php echo $q['no_telp']?></h6>
                  <h6>SPP : Rp</6><?php echo $q['nominal']?></h6>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
    <!-- END Testimonials w/ user image & text & info -->
    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="mb-3 px-6">TAGIHAN PEMBAYARAN</h3>
          </div>
        </div>
        <?php
            $qry=mysqli_query($conn,"SELECT * FROM siswa JOIN spp ON siswa.id_spp=spp.id_spp WHERE nisn='".$_SESSION['nisn']."'");
            $q=mysqli_fetch_array($qry);
        ?>
                <?php
                    $pembayaran=mysqli_query($conn,"SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE jumlah_bayar!=nominal AND nisn='".$_SESSION['nisn']."'");
                        $no=0;
                    $dt=mysqli_num_rows($pembayaran);
                    if($dt>0){
                    while($data=mysqli_fetch_array($pembayaran)){
                        $no++;
                ?>
                <div class="card-body pt-2 p-1">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-3 mb-1 bg-gray-400 border-radius-lg col-xl-11 col-sm-3 mx-6 mt-2">
                            <div class="d-flex flex-column">
                                <span class="mb-1 text-m text-uppercase text-dark"><?php echo $data['bulan'];?></span>
                                <span class="mb-1 text-m"><span class="text-dark font-weight-bold ms-sm-2">Rp<?php echo $data['nominal'];?></span></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php } ?>
                <?php } else {?>
                    <div class="card pt-3 mx-6 col-xl-11 col-sm-3 bg-gray-400">
                        <p align="center" class="text-dark">TIDAK ADA TAGIHAN</p>   
                    </div>
                <?php } ?>
                </br>
                <a href="../index.php" class="btn btn-primary text-center text-m mx-6">Kembali</a>
      </div>    
    </section>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../../assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../../assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>
</body>
</html>