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
                <h6 class="text-white text-capitalize ps-3">DATA PETUGAS</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table_id">
                  <thead>
                    <tr align="center">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $petugas=mysqli_query($conn,"SELECT * FROM petugas ORDER BY id_petugas");
                      $no=0;
                      while($data=mysqli_fetch_array($petugas)){
                        $no++;
                    ?>
                    <tr align="center">
                      <td>
                        <?php echo $no;?>
                      </td>
                      <td>
                        <div class="d-flex justify-content-center d-flex px-3 py-1">
                          <div>
                            <img src="../template/template/assets/img/user 2.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $data['nama_petugas'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-m font-weight-bold mb-0"><?php echo $data['username'];?></p>
                      </td>
                      <td class="align-middle text-center text-m">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $data['level'];?></span>
                      </td>
                      <td class="align-middle py-3">
                        <a href="?petugas=edit&id_petugas=<?php echo $data['id_petugas'];?>"class="text-m btn bg-gradient-info">
                        <i class='bx bxs-edit' style='color:#ffffff'></i>
                        </a>
                        <a href="?petugas=delete&id_petugas=<?php echo $data['id_petugas'];?>"class="text-m btn bg-gradient-danger">
                        <i class='bx bxs-trash-alt' style='color:#ffffff' ></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </br>
                <a href="?petugas=add" class="btn btn-primary">Tambah</a>
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