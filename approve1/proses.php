<?php
require_once "../_config/config.php";

if(isset($_POST['edit'])) {
    $id = @$_POST['id'];
    $approve1 = trim(mysqli_real_escape_string($con, @$_POST['approve1']));
    $ket1 = trim(mysqli_real_escape_string($con, @$_POST['ket1']));
    
    mysqli_query($con, "UPDATE pengajuan SET 
                    approve1 = '$approve1',
                    ket1 = '$ket1'
                    WHERE id_pengajuan = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}
?>