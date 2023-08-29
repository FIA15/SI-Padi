<?php
    require_once "../_config/config.php";
    header("Content-type:application/vnd-ms-excel");
    $date = date('dmY');
    $name = 'Desa-'.$date;
    header("Content-Disposition: attachment; filename=$name.xls");
?>
<div style="margin-left: 50px; text-align: center;" >
<div style="font-size: 23px;">DATA KELURAHAN/DESA KAB.KARAWANG</div>
<div style="font-size: 25px;">DINAS SOSIAL KABUPATEN KARAWANG</div>
<div style="font-size: 12px;">Jl. Husni Hamid No.3, Nagasari, Kec.Karawang Barat, Kabupaten Karawang, Jawa Barat 41312</div>
</div>
<br>
<table border="1">
    <thead >
        <tr>
            <th>No</th>
            <th>ID desa</th>
            <th>Nama desa</th>
            <th>Nama Kecamatan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $query = "SELECT * FROM desa 
                INNER JOIN kecamatan on desa.id_kecamatan = kecamatan.id_kecamatan
            ";
    $sql_desa = mysqli_query($con,$query) or die (mysqli_error($con));
        while($data = mysqli_fetch_array($sql_desa)){?>
            <tr>
                <td style="width: 5%;"><?=$no++?></td>
                <td><?=$data['id_desa']?></td>
                <td><?=$data['nama_desa']?></td>
                <td><?=$data['nama_kecamatan']?></td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>