<?php
require_once "../_config/config.php";
$file = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM pengajuan WHERE id_pengajuan = '$_GET[id]'")) or die (mysqli_error($con));
unlink('../uploads/pengajuan/' . $file['ktp']);
unlink('../uploads/pengajuan/' . $file['kk']);
unlink('../uploads/pengajuan/' . $file['sktm']);
unlink('../uploads/pengajuan/' . $file['rpeng']);
unlink('../uploads/pengajuan/' . $file['fpeng']);
$hapus = "DELETE FROM pengajuan WHERE id_pengajuan='$_GET[id]'";
mysqli_query($con,$hapus);
echo "<script>window.location='data.php';</script>"; 

?>
