<?php
   session_start();
   include 'koneksi.php';
   if($_SESSION['username'] != true){
       echo '<script>window.location="../login.php"</script>'; 
   }
?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link href='http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css' rel='stylesheet' type="text/css">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">DATA PEMBAYARAN</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table_id">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "koneksi.php";
                      $pembayaran=mysqli_query($conn,"SELECT * FROM pembayaran,siswa,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=petugas.id_petugas 
                                AND pembayaran.id_spp=spp.id_spp");
                      $no=0;
                      while($data=mysqli_fetch_array($pembayaran)){
                          $no++;
                    ?>
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
                        <div class="d-flex justify-content-center px-3 py-1">
                          <div>
                            <img src="../template/template/assets/img/user 2.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m"><?php echo $data['nama'];?></h6>
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
                          <?php
                          if($data['jumlah_bayar']==$data['nominal']){ ?>
                              <p class="align-middle text-m font-weight-bold mb-0">Rp<?php echo $data['jumlah_bayar'];?></p>
                          <?php } else if($data['jumlah_bayar']==0){ ?>
                              <p class="align-middle text-m font-weight-bold mb-0">Rp<?php echo $data['jumlah_bayar'];?></p>
                          <?php } else { ?>
                              <p class="align-middle text-m font-weight-bold mb-0">Rp0</p> <?php } ?>
                      </td>
                      <td class="align-middle text-center text-m">
                          <?php
                          if($data['jumlah_bayar']==$data['nominal']){ ?>
                              <span class="badge badge-m bg-gradient-success">LUNAS</span>
                          <?php } else { ?>
                              <span class="badge badge-m bg-gradient-danger">BELUM LUNAS</span> <?php } ?>
                      </td>
                      <td class="align-middle">
                        <a href="?pembayaran=edit&id_pembayaran=<?php echo $data['id_pembayaran'];?>&id_spp=<?php echo $data['id_spp'];?>"class="text-sm btn bg-gradient-info">
                        <i class='bx bxs-edit' style='color:#ffffff'></i>
                        </a>
                        <a href="?pembayaran=delete&id_pembayaran=<?php echo $data['id_pembayaran'];?>"class="text-m btn bg-gradient-danger">
                        <i class='bx bxs-trash-alt' style='color:#ffffff'></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </br>
                <a href="?pembayaran=add" class="btn btn-primary">Tambah</a>
                <a href="pembayaran/laporan.php" input type="submit" name="pdf" class="btn btn-warning">Cetak</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>