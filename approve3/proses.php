<?php
require_once "../_config/config.php";

if(isset($_POST['edit'])) {
    $id = @$_POST['id'];
    $approve3 = trim(mysqli_real_escape_string($con, @$_POST['approve3']));
    $ket3 = trim(mysqli_real_escape_string($con, @$_POST['ket3']));
    
    mysqli_query($con, "UPDATE pengajuan SET 
                    approve3 = '$approve3',
                    ket3 = '$ket3'
                    WHERE id_pengajuan = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}
?>