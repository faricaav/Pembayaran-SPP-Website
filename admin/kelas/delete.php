<?php
if($_GET['id_kelas']){
    include "koneksi.php";
    $qry_hapus=mysqli_query($conn,"DELETE FROM kelas WHERE id_kelas='".$_GET['id_kelas']."'");
    if($qry_hapus){
        echo"<script>alert('Sukses hapus kelas');window.location.href='?kelas=read'</script>";
} else {
    echo "<script>alert('Gagal hapus kelas');window.location.href='?kelas=read'</script>";
}
}
?>