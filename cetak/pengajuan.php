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
    <thead>
        <tr>
            <th>No</th>
            <th>No Pengajuan</th>
            <th>Tanggal Pengajuan</th>
            <th>Pegawai</th>
            <th>NIP</th>
            <th>Kecamatan</th>
            <th>Nama Camat</th>
            <th>Desa / Kelurahan</th>
            <th>Nama Pengaju</th>
            <th>NIK Pengaju</th>
            <th>No Telp</th>
            <th>Status Pengajuan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $query = "SELECT * FROM pengajuan
                INNER JOIN pegawai on pengajuan.nip = pegawai.nip
                INNER JOIN kecamatan on pengajuan.id_kecamatan = kecamatan.id_kecamatan
                INNER JOIN desa on pengajuan.id_desa = desa.id_desa
                INNER JOIN client on pengajuan.nik_p = client.nik_p
                INNER JOIN nmcamat on pengajuan.nip_c = nmcamat.nip_c
            ";
    $sql_pengajuan = mysqli_query($con, $query) or die (mysqli_error($con));
        while($data = mysqli_fetch_array($sql_pengajuan)){
            $status = '';
            if($data['approve1'] == 0){
                $status = '<span class="label label-warning">Menunggu Persetujuan Kecamatan</span>';
            }else if($data['approve1'] == 2){
                $status = '<span class="label label-danger">Pengajuan Di Tolak Kecamatan</span>';
            }else if($data['approve1'] == 1 && $data['approve2'] == 0 ){
                $status = '<span class="label label-warning">Menunggu Persetujuan Kasie</span>';
            }else if($data['approve2'] == 2){
                $status = '<span class="label label-danger">Pengajuan Di Tolak Kasie</span>';
            }else if($data['approve2'] == 1 && $data['approve3'] == 0){
                $status = '<span class="label label-warning">Menunggu Persetujuan Kabid';
                }else if($data['approve3'] == 2){
                $status = '<span class="label label-danger  ">Pengajuan Di Tolak Kabid</span>';
            }else if($data['approve1'] == 1 && $data['approve2'] == 1 && $data['approve3'] == 1){
                $status = '<span class="label label-success">Pengajuan Telah Di Setujui</span>';
            }
            ?>
            <tr>
                <td style="width: 5%;"><?=$no++?></td>
                <td><?=$data['id_pengajuan']?></td>
                <td><?=$data['tanggal_pengajuan']?></td>
                <td><?=$data['nama']?></td>
                <td><?=$data['nip']?></td>
                <td><?=$data['nama_kecamatan']?></td>
                <td><?=$data['nama_camat']?></td>
                <td><?=$data['nama_desa']?></td>
                <td><?=$data['nama_client']?></td>
                <td><?=$data['nik_p']?></td>
                <td><?=$data['notelp']?></td>
                <td><?=$status?></td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>