<?php
if($_GET['nisn']){
    include "koneksi.php";
    $qry_hapus=mysqli_query($conn,"DELETE FROM siswa WHERE nisn='".$_GET['nisn']."'");
    if($qry_hapus){
        echo"<script>alert('Sukses hapus siswa');window.location.href='?siswa=read'</script>";
} else {
    echo "<script>alert('Gagal hapus siswa');window.location.href='?siswa=read'</script>";
}
}
?>