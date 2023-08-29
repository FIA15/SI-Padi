<?php include_once('../_header.php');?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Client
        <small>Tambah Data Client</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-user"></i></li>
        <li class="active ">Master / Client / Tambah Client<li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Client</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIK *</label><small>
                            <input type="hidden" name="kecamatan"  value="<?=$_SESSION['id_kecamatan']?>">
                            <input type="hidden" name="desa"  value="<?=$_SESSION['id_desa']?>">
                            <input type="text" maxlength="16" name="nik_p" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()"  required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama_client"  value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label >Tempat Lahir *</label>
                            <input type="text" name="tempatlahir"  value="" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir *</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" name="tgllahir"  value="" class="datepicker span2 form-control" id="datepicker" required>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" id="" class="form-control"required></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Telp *</label>
                            <input type="number" name="notelp"  value="" class="form-control"  required>
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