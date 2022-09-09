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
                        <h6 class="text-white text-capitalize ps-3">TAMBAH KELAS</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama Kelas</label>
                      <input type="text" name="nama_kelas" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Kompetensi Keahlian</label>
                      <input type="text" name="kompetensi_keahlian" class="form-control">
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
		$nama_kelas=$_POST['nama_kelas'];
		$kompetensi_keahlian=$_POST['kompetensi_keahlian'];
		if(empty($nama_kelas)){
			echo "<script>alert('nama kelas tidak boleh kosong');location.href='?kelas=read';</script>";
		} else if(empty($kompetensi_keahlian)){
			echo "<script>alert('kompetensi keahlian tidak boleh kosong');location.href='?kelas=read';</script>";
		} else {
      $insert=mysqli_query($conn,"INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('".$nama_kelas."','".$kompetensi_keahlian."')");
			if($insert){
			    echo "<script>alert('Kelas berhasil ditambahkan');location.href='?kelas=read';</script>";
			} else {
		        echo "<script>alert('Gagal menambahkan kelas');location.href='?kelas=read';</script>";
			}
		}
	}
?>