<?php
    require_once "../_config/config.php";
    header("Content-type:application/vnd-ms-excel");
    $date = date('dmY');
    $name = 'Pegawai-'.$date;
    header("Content-Disposition: attachment; filename=$name.xls");
?>
<div style="margin-left: 50px; text-align: center;" >
<div style="font-size: 23px;">DATA KECAMATAN KAB.KARAWANG</div>
<div style="font-size: 25px;">DINAS SOSIAL KABUPATEN KARAWANG</div>
<div style="font-size: 12px;">Jl. Husni Hamid No.3, Nagasari, Kec.Karawang Barat, Kabupaten Karawang, Jawa Barat 41312</div>
</div>
<br>
<table border="1">
    <thead  >
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Kecamatan</th>
            <th>Desa</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $query = "SELECT * FROM pegawai 
                INNER JOIN jabatan on pegawai.id_jabatan = jabatan.id_jabatan
                INNER JOIN kecamatan on pegawai.id_kecamatan = kecamatan.id_kecamatan
                INNER JOIN desa on pegawai.id_desa = desa.id_desa
                ";
    $sql_pegawai = mysqli_query($con, $query) or die (mysqli_error($con));
        while($data = mysqli_fetch_array($sql_pegawai)){?>
            <tr>
            <td style="width: 5%;"><?=$no++?></td>
            <td><?=$data['nip']?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['tempatlahir']?>, <?=$data['tgl_lahir']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['notelp']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['nama_jabatan']?></td>
            <td><?=$data['nama_kecamatan']?></td>
            <td><?=$data['nama_desa']?></td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>