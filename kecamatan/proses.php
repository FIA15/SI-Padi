<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_kecamatan']));
        $cekid = mysqli_query($con,"SELECT * FROM kecamatan WHERE id_kecamatan = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_kecamatan']));
        $ceknama = mysqli_query($con,"SELECT * FROM kecamatan WHERE nama_kecamatan = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID KECAMATAN $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA KECAMATAN $nama Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO kecamatan (id_kecamatan, nama_kecamatan) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id_kecamatan'];
        $cekid = mysqli_query($con,"SELECT * FROM kecamatan WHERE id_kecamatan = '$id' AND id_kecamatan !='$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_kecamatan']));
        $ceknama = mysqli_query($con,"SELECT * FROM kecamatan WHERE nama_kecamatan = '$nama' AND id_kecamatan !='$id'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID KECAMATAN $id Sudah Terdaftar!');window.location='data.php?';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('NAMA KECAMATAN $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "UPDATE kecamatan SET id_kecamatan = '$id', nama_kecamatan = '$nama' WHERE id_kecamatan = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>