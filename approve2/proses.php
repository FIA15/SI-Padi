<?php
require_once "../_config/config.php";

if(isset($_POST['edit'])) {
    $id = @$_POST['id'];
    $approve2 = trim(mysqli_real_escape_string($con, @$_POST['approve2']));
    $ket2 = trim(mysqli_real_escape_string($con, @$_POST['ket2']));
    
    mysqli_query($con, "UPDATE pengajuan SET 
                    approve2 = '$approve2',
                    ket2 = '$ket2'
                    WHERE id_pengajuan = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}
?>