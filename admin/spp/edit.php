<?php
    include "koneksi.php";
    $edit=mysqli_query($conn,"SELECT * FROM spp WHERE id_spp='".$_GET['id_spp']."'");
    $e=mysqli_fetch_array($edit);
?>
<main class="main-content  mt-0">
    <section>
    <div class="container-fluid py-4">
      <div class="row">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">EDIT SPP</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="tahun" class="form-control" value="<?php echo $e['tahun'];?>">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="nominal" class="form-control" value="<?php echo $e['nominal'];?>">
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Simpan"> <a href="?spp=read" class="btn btn-danger">Batal</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php 
	session_start();
	if($_POST){
		$tahun=$_POST['tahun'];
		$nominal=$_POST['nominal'];
		if(empty($tahun)){
			echo "<script>alert('tahun tidak boleh kosong');location.href='?spp=read';</script>";
		} else if(empty($nominal)){
			echo "<script>alert('nominal tidak boleh kosong');location.href='?spp=read';</script>";
		} else {
			$update=mysqli_query($conn,"UPDATE spp SET tahun='".$tahun."', nominal='".$nominal."' WHERE id_spp ='".$e['id_spp']."'");
			if($update){
			    echo "<script>alert('SPP berhasil terupdate');location.href='?spp=read';</script>";
			} else {
		        echo "<script>alert('Gagal update SPP');location.href='?spp=read';</script>";
			}
		}
	}
?>