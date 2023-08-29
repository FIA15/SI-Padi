<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_jabatan']));
        $cekid = mysqli_query($con,"SELECT * FROM jabatan WHERE id_jabatan = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['jabatan_name']));
        $ceknama = mysqli_query($con,"SELECT * FROM jabatan WHERE nama_jabatan = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Jabatan $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Jabatan $nama Sudah Terdaftar!');window.location='add.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO jabatan (id_jabatan, nama_jabatan) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id_jabatan'];
        $cekid = mysqli_query($con,"SELECT * FROM jabatan WHERE id_jabatan = '$id' AND id_jabatan !='$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['jabatan_name']));
        $ceknama = mysqli_query($con,"SELECT * FROM jabatan WHERE nama_jabatan = '$nama' AND id_jabatan !='$id'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Jabatan $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Jabatan $nama Sudah Terdaftar!');window.location='data.php';</script>";
    } else {
    mysqli_query($con, "UPDATE jabatan SET id_jabatan = '$id', nama_jabatan = '$nama' WHERE id_jabatan = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>