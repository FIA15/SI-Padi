<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nik_p']));
        $cekid = mysqli_query($con,"SELECT * FROM client WHERE nik_p = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_client']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    $desa = trim(mysqli_real_escape_string($con, @$_POST['desa']));

    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NIK $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO 
    client (nik_p, nama_client, tempatlahir, tgllahir, alamat, notelp, id_kecamatan, id_desa ) 
    VALUES ('$id','$nama','$tl','$tanggal','$alamat','$notelp','$kecamatan','$desa')") 
    or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
    
} else if(isset($_POST['edit'])) {
    $id = $_POST['nik_p'];
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_client']));
    $tl = trim(mysqli_real_escape_string($con, @$_POST['tempatlahir']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tgllahir']));
    $alamat = trim(mysqli_real_escape_string($con, @$_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, @$_POST['notelp']));
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    $desa = trim(mysqli_real_escape_string($con, @$_POST['desa']));
    mysqli_query($con, "UPDATE client SET 
                    nama_client = '$nama', 
                    tempatlahir = '$tl', 
                    tgllahir = '$tanggal', 
                    alamat = '$alamat', 
                    notelp = '$notelp', 
                    id_kecamatan = '$kecamatan',
                    id_desa = '$desa'
                    WHERE nik_p = '$id' ") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

?>