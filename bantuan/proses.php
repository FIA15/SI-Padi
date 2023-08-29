<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_bantuan']));
        $cekid = mysqli_query($con,"SELECT * FROM bantuan WHERE id_bantuan = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_bantuan']));
        $ceknama = mysqli_query($con,"SELECT * FROM bantuan WHERE nama_bantuan = '$nama'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Desa $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else  if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Nama Bantuan $nama Sudah Ada!');window.location='add.php';</script>";
    } else  {
    mysqli_query($con, "INSERT INTO bantuan (id_bantuan, nama_bantuan) VALUES ('$id', '$nama')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id_bantuan'];
        $cekid = mysqli_query($con,"SELECT * FROM bantuan WHERE id_bantuan = '$id' AND id_bantuan !='$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_bantuan']));
        $ceknama = mysqli_query($con,"SELECT * FROM bantuan WHERE nama_bantuan = '$nama' AND id_bantuan !='$id'") or die (mysqli_error($con)); 
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Desa $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else  if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Nama Bantuan $nama Sudah Ada!');window.location='data.php';</script>";
    } else  {
    mysqli_query($con, "UPDATE bantuan SET id_bantuan = '$id', nama_bantuan = '$nama' WHERE id_bantuan = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>