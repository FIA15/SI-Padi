<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Desa
        <small>Edit Data Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active"> Master / Desa / Edit Desa  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Desa </h3>
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
                    $sql_desa = mysqli_query($con,"SELECT * FROM desa WHERE id_desa = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_desa);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>ID Desa *</label><small>
                            <input type="text" name="id_desa" value="<?=$data['id_desa']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama_desa" id="nama" value="<?=$data['nama_desa']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>kecamatan *</label>
                            <select name="kecamatan" class="form-control" id="">
                                <option value="">- Pilih -</option>
                                <?php
                                    $sql_kecamatan = mysqli_query($con, "SELECT * FROM kecamatan ") OR DIE (mysqli_error($con));
                                    while($data_kecamatan = mysqli_fetch_array($sql_kecamatan)){
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