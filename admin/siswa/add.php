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
                        <h6 class="text-white text-capitalize ps-3">TAMBAH SISWA</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NISN</label>
                      <input type="text" name="nisn" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NIS</label>
                      <input type="text" name="nis" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control">
                    </div>
                    <a class="form-label">Kelas</a>
                    <div class="input-group input-group-outline mb-3">
                        <select name="id_kelas" class="form-control">
                        <option></option>
                        <?php
                        $kelas=mysqli_query($conn,"SELECT * FROM kelas");
                        while($data=mysqli_fetch_array($kelas)){
                            echo '<option value="'.$data['id_kelas'].'">'.$data['nama_kelas'].' | '.$data['kompetensi_keahlian'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">No Telp</label>
                      <input type="text" name="no_telp" class="form-control">
                    </div>
                    <a class="form-label">SPP</a>
                    <div class="input-group input-group-outline mb-3">
                        <select name="id_spp" class="form-control">
                        <option></option>
                        <?php
                        $spp=mysqli_query($conn,"SELECT * FROM spp");
                        while($data=mysqli_fetch_array($spp)){
                            echo '<option value="'.$data['id_spp'].'">'.$data['nominal'].' | Tahun '.$data['tahun'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Simpan"> <a href="?siswa=read" class="btn btn-danger">Batal</a>
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
		$nisn=$_POST['nisn'];
		$nis=$_POST['nis'];
    $nama=$_POST['nama'];
		$id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
		$no_telp=$_POST['no_telp'];
    $id_spp=$_POST['id_spp'];
		$username=$_POST['username'];
    $password=$_POST['password'];
		if(empty($nisn)){
			echo "<script>alert('nisn tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($nis)){
			echo "<script>alert('nis tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($nis)){
			echo "<script>alert('nis tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($nama)){
			echo "<script>alert('nama tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($id_kelas)){
			echo "<script>alert('kelas tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($alamat)){
			echo "<script>alert('alamat tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($no_telp)){
			echo "<script>alert('nomor telepon tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($id_spp)){
			echo "<script>alert('SPP tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($username)){
			echo "<script>alert('username tidak boleh kosong');location.href='?siswa=read';</script>";
		} else if(empty($password)){
			echo "<script>alert('password tidak boleh kosong');location.href='?siswa=read';</script>";
		} else {
      $insert=mysqli_query($conn,"INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp, username, password) VALUES ('".$nisn."','".$nis."','".$nama."','".$id_kelas."','".$alamat."','".$no_telp."','".$id_spp."','".$username."','".MD5($password)."')");
			if($insert){
			    echo "<script>alert('Siswa berhasil ditambahkan');location.href='?siswa=read';</script>";
			} else {
		        echo "<script>alert('Gagal menambahkan siswa');location.href='?siswa=read';</script>";
			}
		}
	}
?>