<?php 
	include 'koneksi.php'; 
    $bayar=mysqli_query($conn,"SELECT * FROM pembayaran, spp WHERE pembayaran.id_spp=spp.id_spp AND id_pembayaran='".$_GET['id_pembayaran']."'");
    $b=mysqli_fetch_array($bayar);
	session_start();
	if($_GET){
        $tgl_bayar=date('Y-m-d'); 
        $jumlah_bayar=$_POST['jumlah_bayar']; 
            $update=mysqli_query($conn,"UPDATE pembayaran SET tgl_bayar='".$tgl_bayar."', jumlah_bayar='".$b['nominal']."' WHERE id_pembayaran ='".$b['id_pembayaran']."'");
			if($update){
			    echo "<script>alert('Pembayaran berhasil');location.href='?pembayaran=read';</script>";
			} else {
		        echo "<script>alert('Pembayaran gagal');location.href='?pembayaran=read';</script>";
			}
    }
?>