<?php
require_once "../_config/config.php";

if (isset($_POST['kendaraan'])) {
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));

    $sql_desa = mysqli_query($con, "SELECT * FROM desa WHERE id_kecamatan = $kecamatan") OR DIE (mysqli_error($con));

    while($data_desa = mysqli_fetch_array($sql_desa)){
        echo '<option value="'.$data_desa['id_desa'].'">'.$data_desa['nama_desa'].'</option>';
    }
}