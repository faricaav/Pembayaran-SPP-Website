<?php
if($_GET['id_spp']){
    include "koneksi.php";
    $qry_hapus=mysqli_query($conn,"DELETE FROM spp WHERE id_spp='".$_GET['id_spp']."'");
    if($qry_hapus){
        echo"<script>alert('Sukses hapus SPP');window.location.href='?spp=read'</script>";
} else {
    echo "<script>alert('Gagal hapus SPP');window.location.href='?spp=read'</script>";
}
}
?>