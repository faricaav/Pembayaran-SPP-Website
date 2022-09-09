<?php
   session_start();
   include 'koneksi.php';
   if($_SESSION['username'] != true){
       echo '<script>window.location="../login.php"</script>'; 
   }
?>
<main class="main-content  mt-0">
    <section>
    <div class="container-fluid py-4">
      <div class="row">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">TAMBAH SPP</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Tahun</label>
                      <input type="text" name="tahun" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nominal</label>
                      <input type="text" name="nominal" class="form-control">
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Simpan"> <a href="?kelas=read" class="btn btn-danger">Batal</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php 
	if($_POST){
		$tahun=$_POST['tahun'];
		$nominal=$_POST['nominal'];
		if(empty($tahun)){
			echo "<script>alert('tahun tidak boleh kosong');location.href='?spp=read';</script>";
		} else if(empty($nominal)){
			echo "<script>alert('nominal tidak boleh kosong');location.href='?spp=read';</script>";
		} else {
      $insert=mysqli_query($conn,"INSERT INTO spp (tahun, nominal) VALUES ('".$tahun."','".$nominal."')");
			if($insert){
			    echo "<script>alert('SPP berhasil ditambahkan');location.href='?spp=read';</script>";
			} else {
		        echo "<script>alert('Gagal menambahkan SPP');location.href='?spp=read';</script>";
			}
		}
	}
?>