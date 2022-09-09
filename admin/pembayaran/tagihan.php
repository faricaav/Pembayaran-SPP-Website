<?php
    session_start(); 
    include "koneksi.php";

    $qry=mysqli_query($conn,"SELECT * FROM siswa JOIN spp ON siswa.id_spp=spp.id_spp WHERE nisn='".$_GET['nisn']."'");
    $q=mysqli_fetch_array($qry);
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-3 mb-xl-0 mb-0">
            <div class="card">
                <div class="card-header mt-n3 pb-0">
                <h6 class="mb-0" align="center">INFORMASI TAGIHAN</h6>
                </div>
                    <div class="card-header p-3 pt-2 text-center">
                        <img src="../template/template/assets/img/user 2.png" class="icon icon-shape icon-lg" alt="user1">
                    </div>
                <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0"><?php echo $q['nama'];?></h6>
                    <span class="text-xs">NISN : <?php echo $q['nisn'];?></span>
                    </hr class="horizontal dark my-3">
                    <h5 class="mb-0">Rp<?php echo $q['nominal'];?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="card">
        <?php
            $pembayaran=mysqli_query($conn,"SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE jumlah_bayar!=nominal AND nisn='".$_GET['nisn']."'");
            $no=0;
            $dt=mysqli_num_rows($pembayaran);
            if($dt>0){
            while($data=mysqli_fetch_array($pembayaran)){
                $no++;
        ?>
        <div class="card-body pt-0 p-1">
            <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-3 mb-2 bg-gray-100 border-radius-lg col-xl-11 col-sm-3 mx-6 mt-2">
                    <div class="d-flex flex-column">
                        <span class="mb-1 text-m text-uppercase"><?php echo $data['bulan'];?></span>
                        <span class="mb-1 text-m"><span class="text-dark font-weight-bold ms-sm-2">Rp<?php echo $data['nominal'];?></span></span>
                    </div>
                    <div class="ms-auto text-end">
                        <form action="?pembayaran=bayar&id_pembayaran=<?php echo $data['id_pembayaran'];?>" method="post">
                        <input type="submit" class="btn btn-link text-danger text-gradient px-3 mt-2 mb-0" value="Bayar">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>
        <?php } else {?>
            <div class="card pt-3">
                <p>TIDAK ADA TAGIHAN</p>   
            </div>
        <?php } ?>
</body>
</html>