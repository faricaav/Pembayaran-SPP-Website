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
                        <h6 class="text-white text-capitalize ps-3">TAMBAH PETUGAS</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama Petugas</label>
                      <input type="text" name="nama_petugas" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-select" aria-label="Default select example" name="level">
                        <option value="admin" align="center"> Admin </option>
                        <option value="petugas" align="center"> Petugas </option>
                        </select>
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Simpan"> <a href="?petugas=read" class="btn btn-danger">Batal</a>
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
	  $username=$_POST['username'];
		$password=$_POST['password'];
    $nama=$_POST['nama_petugas'];
    $level=$_POST['level']; 
		if(empty($username)){
			echo "<script>alert('username tidak boleh kosong');location.href='?petugas=read';</script>";
		} else if(empty($password)){
			echo "<script>alert('password tidak boleh kosong');location.href='?petugas=read';</script>";
		} else if(empty($nama)){
			echo "<script>alert('nama tidak boleh kosong');location.href='?petugas=read';</script>";
	    } else if(empty($level)){
			echo "<script>alert('level tidak boleh kosong');location.href='?petugas=read';</script>";
		} else {
			$insert=mysqli_query($conn,"INSERT INTO petugas (username, password, nama_petugas, level) VALUES ('".$username."','".MD5($password)."','".$nama."','".$level."')");
			if($insert){
			    echo "<script>alert('Akun anda berhasil ditambahkan');location.href='?petugas=read';</script>";
			} else {
		        echo "<script>alert('Gagal menambahkan akun anda');location.href='?petugas=read';</script>";
			}
		}
	}
?>