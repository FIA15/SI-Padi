<?php include_once('../_header.php');
if($_SESSION['level'] !== 'User'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Client
        <small>Edit Data Client</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-user"></i></li>
        <li class="active ">Master / Client / Edit Client<li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Client</h3>
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
                    $sql_client = mysqli_query($con,"SELECT * FROM client WHERE nik_p = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_client);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIK *</label><small>
                            <input type="hidden" name="kecamatan"  value="<?=$_SESSION['id_kecamatan']?>">
                            <input type="hidden" name="desa"  value="<?=$_SESSION['id_desa']?>">
                            <input type="text" name="nik_p" value="<?=$data['nik_p']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama_client"  value="<?=$data['nama_client']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempatlahir"  value="<?=$data['tempatlahir']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgllahir"  value="<?=date('Y-m-d')?>" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" id="" class="form-control"required><?=$data['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="text" name="notelp"  value="<?=$data['notelp']?>" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit" class="btn btn-success"><i class="fa fa-paper-plane "></i> Save</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>