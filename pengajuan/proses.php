<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $id = trim(mysqli_real_escape_string($con, @$_POST['id']));
    $user_id = trim(mysqli_real_escape_string($con, @$_POST['user_id']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $nip_c = trim(mysqli_real_escape_string($con, @$_POST['nip_c']));
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    $desa = trim(mysqli_real_escape_string($con, @$_POST['desa']));
    $nik_p = trim(mysqli_real_escape_string($con, @$_POST['nik_p']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tanggal']));
    $id_bantuan = trim(mysqli_real_escape_string($con, @$_POST['id_bantuan']));

    $ktp = upload_ktp();
        if (!$ktp){
            return false;
        }
    $kk = upload_kk();
        if (!$kk){
            return false;
        }
    $sktm = upload_sktm();
        if (!$sktm){
            return false;
        }
    $fpeng = upload_fpeng();
        if (!$fpeng){
            return false;
        }
    $rpeng = upload_rpeng();
        if (!$rpeng){
            return false;
        }

    mysqli_query($con, "INSERT INTO 
    pengajuan   (user_id, nip, id_kecamatan, id_desa, id_pengajuan, nik_p, tanggal_pengajuan, id_bantuan, nip_c, ktp, kk, sktm, fpeng, rpeng) 
    VALUES ('$user_id', '$nip', '$kecamatan', '$desa', '$id', '$nik_p', '$tanggal', '$id_bantuan', '$nip_c', '$ktp', '$kk', '$sktm', '$fpeng', '$rpeng')") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
} else if(isset($_POST['edit'])) {
    $id = @$_POST['id'];
    $user_id = trim(mysqli_real_escape_string($con, @$_POST['user_id']));
    $nip = trim(mysqli_real_escape_string($con, @$_POST['nip']));
    $nip_c = trim(mysqli_real_escape_string($con, @$_POST['nip_c']));
    $kecamatan = trim(mysqli_real_escape_string($con, @$_POST['kecamatan']));
    $desa = trim(mysqli_real_escape_string($con, @$_POST['desa']));
    $nik_p = trim(mysqli_real_escape_string($con, @$_POST['nik_p']));
    $tanggal = trim(mysqli_real_escape_string($con, @$_POST['tanggal']));
    $id_bantuan = trim(mysqli_real_escape_string($con, @$_POST['id_bantuan']));
    $ktp = upload_ktp();
        if (!$ktp){
            return false;
        }
    $kk = upload_kk();
        if (!$kk){
            return false;
        }
    $sktm = upload_sktm();
        if (!$sktm){
            return false;
        }
    $fpeng = upload_fpeng();
        if (!$fpeng){
            return false;
        }
    $rpeng = upload_rpeng();
        if (!$rpeng){
            return false;
        }
    mysqli_query($con, "UPDATE pengajuan SET 
                    user_id = '$user_id', 
                    nip = '$nip', 
                    nip_c = '$nip_c', 
                    id_kecamatan = '$kecamatan', 
                    id_desa = '$desa',  
                    nik_p = '$nik_p', 
                    tanggal_pengajuan = '$tanggal', 
                    id_bantuan = '$id_bantuan',
                    ktp = '$ktp',
                    kk = '$kk',
                    sktm = '$sktm',
                    fpeng = '$fpeng',
                    rpeng = '$rpeng'
                    WHERE id_pengajuan = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}

function upload_ktp(){

    $namaktp = $_FILES['ktp']['name'];
    $ukuranktp = $_FILES['ktp']['size'];
    $errorktp = $_FILES['ktp']['error'];
    $tmpktp = $_FILES['ktp']['tmp_name'];
    // cek upload apa belum
    if ($errorktp === 4){
        echo "<script>alert('Pilih Gambar KTP Terlebih Dahulu !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }
  
    // cek ekstensi gambar
    $ekstensigambarvalidktp = ['jpg','jpeg','png'];
    $ekstensigambarktp = explode('.',$namaktp); //explode = untuk memisahkan kata ('.') berarti memsiahkan kata sebelum dan sesudah .
    $ekstensigambarktp = strtolower(end($ekstensigambarktp)); //strtolower = menjadikan huruf kecil semua ,end = mengambil kata paling terakhir
    if(!in_array($ekstensigambarktp, $ekstensigambarvalidktp)){
        echo "<script>alert('Gambar Harus Bertipe JPG / JPEG / PNG !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ukuran maksimal 4 mb
    if($ukuranktp > 4194304){
        echo "<script>alert('Ukuran Maksimal Gambar 4 MB !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    $namaktpbaru = 'KTP-'.date('dmy').'-'.uniqid();
    $namaktpbaru .= '.';
    $namaktpbaru .= $ekstensigambarktp;
    move_uploaded_file($tmpktp, '../uploads/pengajuan/'.$namaktpbaru); //move_uploaded_file untuk memindahkan file

    return $namaktpbaru;
}
function upload_kk(){

    $namakk = $_FILES['kk']['name'];
    $ukurankk = $_FILES['kk']['size'];
    $errorkk = $_FILES['kk']['error'];
    $tmpkk = $_FILES['kk']['tmp_name'];
    // cek upload apa belum
    if ($errorkk === 4){
        echo "<script>alert('Pilih Gambar KK Terlebih Dahulu !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ekstensi gambar
    $ekstensigambarvalidkk = ['jpg','jpeg','png'];
    $ekstensigambarkk = explode('.',$namakk); //explode = untuk memisahkan kata ('.') berarti memsiahkan kata sebelum dan sesudah .
    $ekstensigambarkk = strtolower(end($ekstensigambarkk)); //strtolower = menjadikan huruf kecil semua ,end = mengambil kata paling terakhir
    if(!in_array($ekstensigambarkk, $ekstensigambarvalidkk)){
        echo "<script>alert('Gambar Harus Bertipe JPG / JPEG / PNG !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ukuran maksimal 4 mb
    if($ukurankk > 4194304){
        echo "<script>alert('Ukuran Maksimal Gambar 4 MB !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    $namakkbaru = 'KK-'.date('dmy').'-'.uniqid();
    $namakkbaru .= '.';
    $namakkbaru .= $ekstensigambarkk;
    move_uploaded_file($tmpkk, '../uploads/pengajuan/'.$namakkbaru); //move_uploaded_file untuk memindahkan file

    return $namakkbaru;
}
function upload_sktm(){

    $namasktm = $_FILES['sktm']['name'];
    $ukuransktm = $_FILES['sktm']['size'];
    $errorsktm = $_FILES['sktm']['error'];
    $tmpsktm = $_FILES['sktm']['tmp_name'];
    // cek upload apa belum
    if ($errorsktm === 4){
        echo "<script>alert('Pilih Gambar SKTM Terlebih Dahulu !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ekstensi gambar
    $ekstensigambarvalidsktm = ['jpg','jpeg','png'];
    $ekstensigambarsktm = explode('.',$namasktm); //explode = untuk memisahkan kata ('.') berarti memsiahkan kata sebelum dan sesudah .
    $ekstensigambarsktm = strtolower(end($ekstensigambarsktm)); //strtolower = menjadikan huruf kecil semua ,end = mengambil kata paling terakhir
    if(!in_array($ekstensigambarsktm, $ekstensigambarvalidsktm)){
        echo "<script>alert('Gambar Harus Bertipe JPG / JPEG / PNG !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ukuran maksimal 4 mb
    if($ukuransktm > 4194304){
        echo "<script>alert('Ukuran Maksimal Gambar 4 MB !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    $namasktmbaru = 'SKTM-'.date('dmy').'-'.uniqid();
    $namasktmbaru .= '.';
    $namasktmbaru .= $ekstensigambarsktm;
    move_uploaded_file($tmpsktm, '../uploads/pengajuan/'.$namasktmbaru); //move_uploaded_file untuk memindahkan file

    return $namasktmbaru;
}
function upload_fpeng(){

    $namafpeng = $_FILES['fpeng']['name'];
    $ukuranfpeng = $_FILES['fpeng']['size'];
    $errorfpeng = $_FILES['fpeng']['error'];
    $tmpfpeng = $_FILES['fpeng']['tmp_name'];
    // cek upload apa belum
    if ($errorfpeng === 4){
        echo "<script>alert('Pilih Foto Pengguna Terlebih Dahulu !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ekstensi gambar
    $ekstensigambarvalidfpeng = ['jpg','jpeg','png'];
    $ekstensigambarfpeng = explode('.',$namafpeng); //explode = untuk memisahkan kata ('.') berarti memsiahkan kata sebelum dan sesudah .
    $ekstensigambarfpeng = strtolower(end($ekstensigambarfpeng)); //strtolower = menjadikan huruf kecil semua ,end = mengambil kata paling terakhir
    if(!in_array($ekstensigambarfpeng, $ekstensigambarvalidfpeng)){
        echo "<script>alert('Gambar Harus Bertipe JPG / JPEG / PNG !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ukuran maksimal 4 mb
    if($ukuranfpeng > 4194304){
        echo "<script>alert('Ukuran Maksimal Gambar 4 MB !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    $namafpengbaru = 'FPENG-'.date('dmy').'-'.uniqid();
    $namafpengbaru .= '.';
    $namafpengbaru .= $ekstensigambarfpeng;
    move_uploaded_file($tmpfpeng, '../uploads/pengajuan/'.$namafpengbaru); //move_uploaded_file untuk memindahkan file

    return $namafpengbaru;
}
function upload_rpeng(){

    $namarpeng = $_FILES['rpeng']['name'];
    $ukuranrpeng = $_FILES['rpeng']['size'];
    $errorrpeng = $_FILES['rpeng']['error'];
    $tmprpeng = $_FILES['rpeng']['tmp_name'];
    // cek upload apa belum
    if ($errorrpeng === 4){
        echo "<script>alert('Pilih Foto Rumah Pengguna Terlebih Dahulu !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ekstensi gambar
    $ekstensigambarvalidrpeng = ['jpg','jpeg','png'];
    $ekstensigambarrpeng = explode('.',$namarpeng); //explode = untuk memisahkan kata ('.') berarti memsiahkan kata sebelum dan sesudah .
    $ekstensigambarrpeng = strtolower(end($ekstensigambarrpeng)); //strtolower = menjadikan huruf kecil semua ,end = mengambil kata paling terakhir
    if(!in_array($ekstensigambarrpeng, $ekstensigambarvalidrpeng)){
        echo "<script>alert('Gambar Harus Bertipe JPG / JPEG / PNG !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    // cek ukuran maksimal 4 mb
    if($ukuranrpeng > 4194304){
        echo "<script>alert('Ukuran Maksimal Gambar 4 MB !!')</script>";
        echo "<script>window.location='add.php';</script>"; 
        return false;
    }

    $namarpengbaru = 'RPENG-'.date('dmy').'-'.uniqid();
    $namarpengbaru .= '.';
    $namarpengbaru .= $ekstensigambarrpeng;
    move_uploaded_file($tmprpeng, '../uploads/pengajuan/'.$namarpengbaru); //move_uploaded_file untuk memindahkan file

    return $namarpengbaru;
}
?>