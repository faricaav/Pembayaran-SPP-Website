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
                <h6 class="text-white text-capitalize ps-3">DATA SPP</h6>
              </div>
            </div>
            <div class="card-body px-5 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="table_id">
                  <thead>
                    <tr align="center">
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nominal</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $spp=mysqli_query($conn,"SELECT * FROM spp ORDER BY id_spp");
                      $no=0;
                      while($data=mysqli_fetch_array($spp)){
                          $no++;
                    ?>
                    <tr align="center">
                      <td>
                          <?php echo $no;?>
                      </td>
                      <td>
                          <p class="text-m font-weight-bold mb-0"><?php echo $data['tahun'];?></p>
                      </td>
                      <td class="align-middle text-center text-m">
                        <span class="badge badge-sm bg-gradient-success">Rp<?php echo $data['nominal'];?></span>
                      </td>
                      <td class="align-right py-3">
                        <a href="?spp=edit&id_spp=<?php echo $data['id_spp'];?>"class="text-m btn bg-gradient-info">
                        <i class='bx bxs-edit' style='color:#ffffff'></i>
                        </a>
                        <a href="?spp=delete&id_spp=<?php echo $data['id_spp'];?>"class="text-m btn bg-gradient-danger" data-toggle="tooltip" data-original-title="Edit user">
                        <i class='bx bxs-trash-alt' style='color:#ffffff' ></i>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </br>
                <a href="?spp=add" class="btn btn-primary">Tambah</a>
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