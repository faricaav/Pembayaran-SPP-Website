<?php
    include "koneksi.php";
    $edit=mysqli_query($conn,"SELECT * FROM kelas WHERE id_kelas='".$_GET['id_kelas']."'");
    $e=mysqli_fetch_array($edit);
?>
<main class="main-content  mt-0">
    <section>
    <div class="container-fluid py-4">
      <div class="row">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">EDIT KELAS</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="nama_kelas" class="form-control" value="<?php echo $e['nama_kelas'];?>">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="kompetensi_keahlian" class="form-control" value="<?php echo $e['kompetensi_keahlian'];?>">
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
	session_start();
	if($_POST){
		$nama_kelas=$_POST['nama_kelas'];
		$kompetensi_keahlian=$_POST['kompetensi_keahlian'];
		if(empty($nama_kelas)){
			echo "<script>alert('nama kelas tidak boleh kosong');location.href='?kelas=read';</script>";
		} else if(empty($kompetensi_keahlian)){
			echo "<script>alert('kompetensi keahlian tidak boleh kosong');location.href='?kelas=read';</script>";
		} else {
			include "koneksi.php";
			$update=mysqli_query($conn,"UPDATE kelas SET nama_kelas='".$nama_kelas."', kompetensi_keahlian='".$kompetensi_keahlian."' WHERE id_kelas ='".$e['id_kelas']."'");
			if($update){
			    echo "<script>alert('Kelas berhasil terupdate');location.href='?kelas=read';</script>";
			} else {
		        echo "<script>alert('Gagal update kelas');location.href='?kelas=read';</script>";
			}
		}
	}
?>