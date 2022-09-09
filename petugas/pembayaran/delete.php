<?php
if($_GET['id_pembayaran']){
    include "koneksi.php";
    $qry_hapus=mysqli_query($conn,"DELETE FROM pembayaran WHERE id_pembayaran='".$_GET['id_pembayaran']."'");
    if($qry_hapus){
        echo"<script>alert('Sukses hapus pembayaran');window.location.href='?pembayaran=read'</script>";
} else {
    echo "<script>alert('Gagal hapus pembayaran');window.location.href='?pembayaran=read'</script>";
}
}
?>