<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['nip_c']));
        $cekid = mysqli_query($con,"SELECT * FROM nmcamat WHERE nip_c = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_camat'])); 
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
        $cekkec = mysqli_query($con,"SELECT * FROM nmcamat WHERE id_kecamatan = '$kecamatan'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NIP $id Sudah Terdaftar!');window.location='add.php';</script>";
    }else if(mysqli_num_rows($cekkec) > 0){
        echo "<script>alert('Kecamatan Sudah Mempunyai Camat!');window.location='add.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO nmcamat (nip_c, nama_camat, id_kecamatan) VALUES ('$id', '$nama', '$kecamatan')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['nip_c'];
        $cekid = mysqli_query($con,"SELECT * FROM nmcamat WHERE nip_c = '$id' AND nip_c !='$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_camat'])); 
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
        $cekkec = mysqli_query($con,"SELECT * FROM nmcamat WHERE id_kecamatan = '$kecamatan' AND nip_c !='$id'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('NIP $id Sudah Terdaftar!');window.location='data.php';</script>";
    }else if(mysqli_num_rows($cekkec) > 0){
        echo "<script>alert('Kecamatan Sudah Mempunyai Camat!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "UPDATE nmcamat SET nip_c = '$id', nama_camat = '$nama', id_kecamatan = '$kecamatan' WHERE nip_c = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>