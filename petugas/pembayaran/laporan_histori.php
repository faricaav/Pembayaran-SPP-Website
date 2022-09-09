<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> 
    <title>PDF DATA PEMBAYARAN SPP</title>
    <style>
        @page {size: A4 landscape}
        body{
            font-family:arial;
            background-color:#ccc;
        }
        .rangka{
            margin:0 auto;
            background-color:#fff;
            padding:50px;
        }
        table{
            border-bottom: 5px solid #000;
            padding: 5px;
        }
        .tengah{
            text-align: center;
            line-height:15px;
        }
        th{
            color:#333333;
            font-weight:bold;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <div class="A4 landscpae rangka">
        <table width="100%">
            <tr>
                <td><img src="../../template/template/assets/img/logo smk telkom malang.png" width="90px"></td>
                <td class="tengah">
                    <h5>YAYASAN PENDIDIKAN TELKOM</h5>
                    <h1>SMK Telkom Sandhy Putra Malang</h1>
                    <h2>Terakreditasi A</h2>
                    <b>Jl. Danau Ranau, Sawojajar, Malang 65139, Tlp (0341)712500</b>
                    <p>Laman : www.smktelkom-mlg.sch.id Surel : info@smktelkom-mlg.sch.id</p>
                </td>
            </tr>
        </table>
        <table style="border-collapse:collapse; border:1px solid black;" width="100%">
            <tr>
                </br>
                <th style="width:5%">No</th>
                <th style="width:5%">ID Pembayaran</th>
                <th style="width:10%">Nama Petugas</th>
                <th style="width:10%">NISN</th>
                <th style="width:20%">Nama Siswa</th>
                <th style="width:10%">Tanggal Bayar</th>
                <th style="width:10%">Bulan</th>
                <th style="width:10%">SPP</th>
                <th style="width:10%">Jumlah Bayar</th>
                <th style="width:20%">Status</th>
            </tr>
            <?php
            include '../../koneksi.php'; 
            $pembayaran=mysqli_query($conn,"SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp
            JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas WHERE nisn='".$_GET['nisn']."'");
            $no=0;
            while($data=mysqli_fetch_array($pembayaran)){
            $no++;?>
                <tr align="center" style="border:1px solid black;">
                    <td style="width:5%; border:1px solid black;"><?php echo $no;?></td>
                    <td style="width:5%; border:1px solid black;"><?php echo $data['id_pembayaran'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['nama_petugas'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['nisn'];?></td>
                    <td <?php $qry=mysqli_query($conn,"SELECT * FROM siswa WHERE nisn='".$_GET['nisn']."'");
                        $q=mysqli_fetch_array($qry); ?> style="width:20%; border:1px solid black;"><?php echo $q['nama'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['tgl_bayar'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['bulan'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['nominal'];?></td>
                    <td style="width:10%; border:1px solid black;"><?php echo $data['jumlah_bayar'];?></td>
                    <td style="width:20%; border:1px solid black;"><?php
                            if($data['jumlah_bayar']==$data['nominal']){ ?>
                                <p>LUNAS</p>
                            <?php } else { ?>
                                <p>BELUM LUNAS</p> <?php } ?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</body>
<script>
    window.print(); 
</script>
</head>
</html>