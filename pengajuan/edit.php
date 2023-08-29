<?php include_once('../_header.php');
if($_SESSION['level'] !== 'User'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pegawai
        <small>Tambah Data Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Pegawai / Tambah Pegawai  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pegawai</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_pengajuan = mysqli_query($con,"SELECT * FROM pengajuan WHERE id_pengajuan = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_pengajuan);
                ?>
                    <form action="proses.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Pengajuan</label>
                            <label > : </label>
                            <input type="hidden" name="nip"  value="<?=$_SESSION['nip']?>">
                            <input type="hidden" name="kecamatan"  value="<?=$_SESSION['id_kecamatan']?>">
                            <input type="hidden" name="desa"  value="<?=$_SESSION['id_desa']?>">
                            <input type="text" name="id" value="<?=$data['id_pengajuan']?>" >
                        </div>
                        <div class="form-group">
                            <label>NIP Pegawai</label>
                            <label> : </label>
                            <?=$data['nip']?>
                            <input type="text" name="user_id"  value="<?=$data['nip']?>">
                        </div>
                        <div class="form-group">
                            <label>Nama*</label>
                            <select name="nik_p" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $desa = $_SESSION['id_desa'];
                                    $sql_client = mysqli_query($con, "SELECT * FROM client WHERE id_desa = '$desa'") OR DIE (mysqli_error($con));
                                    while($data_client = mysqli_fetch_array($sql_client)){
                                        echo '<option value="'.$data_client['nik_p'].'">'.$data_client['nik_p'].' - '.$data_client['nama_client'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tanggal"  value="<?=date('Y-m-d')?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Kategori Bantuan *</label>
                            <select name="id_bantuan" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_bantuan = mysqli_query($con, "SELECT * FROM bantuan ") OR DIE (mysqli_error($con));
                                    while($data_bantuan = mysqli_fetch_array($sql_bantuan)){
                                        echo '<option value="'.$data_bantuan['id_bantuan'].'">'.$data_bantuan['nama_bantuan'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Camat *</label>
                            <select name="nip_c" class="form-control" id="" required>
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_camat = mysqli_query($con, "SELECT * FROM nmcamat INNER JOIN kecamatan on nmcamat.id_kecamatan = kecamatan.id_kecamatan") OR DIE (mysqli_error($con));
                                    while($data_camat = mysqli_fetch_array($sql_camat)){
                                        echo '<option value="'.$data_camat['nip_c'].'">'.$data_camat['nama_kecamatan'].' - '.$data_camat['nama_camat'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>KTP *</label>
                            <input type="file" name="ktp"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KK *</label>
                            <input type="file" name="kk"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>SKTM *</label>
                            <input type="file" name="sktm"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto Pengaju *</label>
                            <input type="file" name="fpeng"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Foto Rumah Pengaju *</label>
                            <input type="file" name="rpeng"  class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success"><i class="fa fa-paper-plane "></i> Save</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>