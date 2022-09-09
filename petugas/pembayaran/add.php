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
                        <h6 class="text-white text-capitalize ps-3">TAMBAH PEMBAYARAN</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <form form action="" method="post" role="form" class="text-start">
                    <a class="form-label">Petugas</a>
                    <div class="input-group input-group-outline mb-3">
                        <select name="id_petugas" class="form-control">
                        <option></option>
                        <?php
                        $petugas=mysqli_query($conn,"SELECT * FROM petugas");
                        while($data=mysqli_fetch_array($petugas)){
                            echo '<option value="'.$data['id_petugas'].'">'.$data['nama_petugas'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <a class="form-label">NISN</a>
                    <div class="input-group input-group-outline mb-3">
                        <select name="nisn" class="form-control">
                        <option></option>
                        <?php
                        $siswa=mysqli_query($conn,"SELECT * FROM siswa");
                        while($data=mysqli_fetch_array($siswa)){
                            echo '<option value="'.$data['nisn'].'">'.$data['nisn'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <a class="form-label">Tanggal Bayar</a>
                    <div class="input-group input-group-outline mb-3">
                      <input type="date" name="tgl_bayar" class="form-control">
                    </div>
                    <a class="form-label">Bulan</a>
                    <div>
                        <select class="form-select" aria-label="Default select example" name="bulan">
                        <option value="Januari" align="center"> Januari </option>
                        <option value="Februari" align="center"> Februari </option>
                        <option value="Maret" align="center"> Maret </option>
                        <option value="April" align="center"> April </option>
                        <option value="Mei" align="center"> Mei </option>
                        <option value="Juni" align="center"> Juni </option>
                        <option value="Juli" align="center"> Juli </option>
                        <option value="Agustus" align="center"> Agustus </option>
                        <option value="September" align="center"> September </option>
                        <option value="Oktober" align="center"> Oktober </option>
                        <option value="November" align="center"> November </option>
                        <option value="Desember" align="center"> Desember </option>
                        </select>
                    </div>
                    <a class="form-label">SPP</a>
                    <div class="input-group input-group-outline mb-3">
                        <select name="id_spp" class="form-control">
                        <option></option>
                        <?php
                        $spp=mysqli_query($conn,"SELECT * FROM spp");
                        while($data=mysqli_fetch_array($spp)){
                            echo '<option value="'.$data['id_spp'].'">'.$data['nominal'].' | '.$data['tahun'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Jumlah Bayar</label>
                      <input type="text" name="jumlah_bayar" class="form-control">
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-primary" value="Simpan"> <a href="?pembayaran=read" class="btn btn-danger">Batal</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php 
    $spp=mysqli_query($conn,"SELECT * FROM spp");
    $data=mysqli_fetch_array($spp);
	if($_POST){
        $id_petugas=$_POST['id_petugas'];
		$nisn=$_POST['nisn'];
        $tgl_bayar=$_POST['tgl_bayar'];
        $bulan=$_POST['bulan'];
		$id_spp=$_POST['id_spp'];
        $jumlah_bayar=$_POST['jumlah_bayar'];
		if(empty($id_petugas)){
			echo "<script>alert('petugas tidak boleh kosong');location.href='?pembayaran=read';</script>";
		} else if(empty($nisn)){
			echo "<script>alert('nisn tidak boleh kosong');location.href='?pembayaran=read';</script>";
		} else if(empty($bulan)){
			echo "<script>alert('bulan tidak boleh kosong');location.href='?pembayaran=read';</script>";
		} else if(empty($id_spp)){
			echo "<script>alert('spp tidak boleh kosong');location.href='?pembayaran=read';</script>";
		} else if($jumlah_bayar!=$data['nominal'] && $jumlah_bayar!=0){
            echo "<script>alert('Pembayaran harus langsung lunas');location.href='?pembayaran=read';</script>";
        } else {
            $insert=mysqli_query($conn,"INSERT INTO pembayaran (id_petugas, nisn, tgl_bayar, bulan, id_spp, jumlah_bayar) VALUES ('".$id_petugas."','".$nisn."','".$tgl_bayar."','".$bulan."','".$id_spp."','".$jumlah_bayar."')");
			if($insert){
			    echo "<script>alert('Pembayaran berhasil ditambahkan');location.href='?pembayaran=read';</script>";
			} else {
		        echo "<script>alert('Gagal menambahkan pembayaran');location.href='?pembayaran=read';</script>";
			}
		}
	}
?>