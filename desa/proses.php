<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id_desa']));
        $cekid = mysqli_query($con,"SELECT * FROM desa WHERE id_desa = '$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_desa']));
        $ceknama = mysqli_query($con,"SELECT * FROM desa WHERE nama_desa = '$nama'") or die (mysqli_error($con)); 
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Desa $id Sudah Terdaftar!');window.location='add.php';</script>";
    } else  if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Nama Desa $nama Sudah Ada!');window.location='add.php';</script>";
    } else  {
    mysqli_query($con, "INSERT INTO desa (id_desa, nama_desa, id_kecamatan) VALUES ('$id', '$nama', '$kecamatan')") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = $_POST['id_desa'];
        $cekid = mysqli_query($con,"SELECT * FROM desa WHERE id_desa = '$id' AND id_desa !='$id'") or die (mysqli_error($con)); 
    $nama = trim(mysqli_real_escape_string($con, @$_POST['nama_desa']));
        $ceknama = mysqli_query($con,"SELECT * FROM desa WHERE nama_desa = '$nama' AND id_desa !='$id'") or die (mysqli_error($con)); 
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    if(mysqli_num_rows($cekid) > 0){
        echo "<script>alert('ID Desa $id Sudah Terdaftar!');window.location='data.php';</script>";
    } else  if(mysqli_num_rows($ceknama) > 0){
        echo "<script>alert('Nama Desa $nama Sudah Ada!');window.location='data.php';</script>";
    } else  {
    mysqli_query($con, "UPDATE desa SET id_desa = '$id', nama_desa = '$nama', id_kecamatan = '$kecamatan' WHERE id_desa = '$id'") or die(mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>"; 
}

?>