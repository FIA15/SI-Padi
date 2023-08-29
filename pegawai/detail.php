<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pegawai
        <small>Detail Data Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pegawai / Detail Pegawai  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Pegawai</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                <?php
                    $id = @$_GET['id'];
                    $sql_desa = mysqli_query($con,"SELECT * FROM pegawai WHERE nip = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_desa);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIP *</label>
                            <input type="text" name="nip" value="<?=$data['nip']?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama" id="nama" value="<?=$data['nama']?>" class="form-control" disabled >
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempat_lahir"  value="<?=$data['tempatlahir']?>" class="form-control" disabled >
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                                <input type="date" name="tanggal"  value="<?=$data['tgl_lahir']?>" class="form-control" disabled >
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" id="" class="form-control" disabled><?=$data['alamat']?></textarea>
                        </div>
                    </div>
                        <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="text" name="notelp"  value="<?=$data['notelp']?>" class="form-control"  disabled>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="text" name="email"  value="<?=$data['email']?>" class="form-control"  disabled>
                        </div>
                        <div class="form-group">
                            <label>Jabatan *</label>
                            <select name="jabatan" class="form-control" id="" disabled>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_jabatan = mysqli_query($con, "SELECT * FROM jabatan ") OR DIE (mysqli_error($con));
                                    while($data_jabatan = mysqli_fetch_array($sql_jabatan)){
                                    if($data_jabatan['id_jabatan'] == $data['id_jabatan']){
                                    ?>
                                    <option value="<?=$data_jabatan['id_jabatan']?>" selected="selected"><?=$data_jabatan['nama_jabatan']?></option> 
                                    <?php
                                        }else{																	
                                    ?>
                                    <option value="<?=$data_jabatan['id_jabatan']?>"><?=$data_jabatan['nama_jabatan']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>kecamatan *</label>
                            <select name="kecamatan" class="form-control" id="" disabled>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_kecamatan = mysqli_query($con, "SELECT * FROM kecamatan ") OR DIE (mysqli_error($con));
                                    while($data_kecamatan = mysqli_fetch_array($sql_kecamatan)){
                                        // echo '<option value="'.$data_kecamatan['id_kecamatan'].'">'.$data_kecamatan['nama_kecamatan'].'</option>';
                                    if($data_kecamatan['id_kecamatan'] == $data['id_kecamatan']){
                                    ?>
                                    <option value="<?=$data_kecamatan['id_kecamatan']?>" selected="selected"><?=$data_kecamatan['nama_kecamatan']?></option> 
                                    <?php
                                            }else{																	
                                    ?>
                                    <option value="<?=$data_kecamatan['id_kecamatan']?>"><?=$data_kecamatan['nama_kecamatan']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Desa / Kelurahan *</label>
                            <select name="desa" class="form-control" id="" disabled>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_desa = mysqli_query($con, "SELECT * FROM desa ") OR DIE (mysqli_error($con));
                                    while($data_desa = mysqli_fetch_array($sql_desa)){
                                        // echo '<option value="'.$data_kecamatan['id_kecamatan'].'">'.$data_kecamatan['nama_kecamatan'].'</option>';
                                    if($data_desa['id_desa'] == $data['id_desa']){
                                    ?>
                                    <option value="<?=$data_desa['id_desa']?>" selected="selected"><?=$data_desa['nama_desa']?></option> 
                                    <?php
                                            }else{																	
                                    ?>
                                    <option value="<?=$data_desa['id_desa']?>"><?=$data_desa['nama_desa']?></option> 
                                    <?php
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="edit.php?id=<?=$data['nip']?>"  class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Update  </a>
                            <a href="del.php?id=<?=$data['nip']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete  </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>