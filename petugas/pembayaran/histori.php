<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">HISTORI PEMBAYARAN</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr align="center">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Petugas</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NISN</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Bayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SPP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Bayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    session_start();
                      include "koneksi.php";
                      $pembayaran=mysqli_query($conn,"SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp
                      JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas WHERE nisn='".$_GET['nisn']."'");
                      $no=0;
                      while($data=mysqli_fetch_array($pembayaran)){
                          $no++;
                    ?>
                    <?php if($data['jumlah_bayar']==$data['nominal']){ ?>
                    <tr align="center">
                      <td>
                        <?php echo $no;?>
                      </td>
                      <td>
                        <h6 class="mb-0 text-m"><?php echo $data['nama_petugas'];?></h6>
                      </td>
                      <td>
                        <?php echo $data['nisn'];?>
                      </td>
                      <td>
                        <?php 
                        $qry=mysqli_query($conn,"SELECT * FROM siswa WHERE nisn='".$_GET['nisn']."'");
                        $q=mysqli_fetch_array($qry); ?>
                        <div class="d-flex justify-content-center px-3 py-1">
                          <div>
                            <img src="../template/template/assets/img/user 2.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m"><?php echo $q['nama'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <?php
                          if($data['jumlah_bayar']==0){ ?>
                            <p class="align-middle text-m font-weight-bold mb-0">-</p>
                        <?php } else { ?>
                            <p class="align-middle text-m font-weight-bold mb-0"><?php echo $data['tgl_bayar'];?></p>
                        <?php } ?>
                      </td>
                      <td>
                        <p class="text-m font-weight-bold mb-0"><?php echo $data['bulan'];?></p>
                      </td>
                      <td>
                        <p class="text-m font-weight-bold mb-0">Rp<?php echo $data['nominal'];?></p>
                      </td>
                      <td>
                        <p class="align-middle text-m font-weight-bold mb-0">Rp<?php echo $data['jumlah_bayar'];?></p>
                      </td>
                      <td class="align-middle text-center text-m">
                            <span class="badge badge-m bg-gradient-success">LUNAS</span>
                      </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>
                </br>
                <a href='pembayaran/laporan_histori.php?nisn=<?php echo $q['nisn'];?>' input type="submit" name="pdf" class="btn btn-warning">Cetak</a>
                <a href="?siswa=read" class="btn btn-primary">Kembali</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>