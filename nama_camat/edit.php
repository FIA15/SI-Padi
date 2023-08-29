<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Nama Camat 
        <small>Edit Data Nama Camat </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Master / Desa / Edit Nama Camat <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Nama Camat</h3>
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
                    $sql_camat = mysqli_query($con,"SELECT * FROM nmcamat WHERE nip_c = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_camat);
                ?>
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>NIP Camat *</label><small>
                            <input type="text" name="nip_c" value="<?=$data['nip_c']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()"  readonly required>
                        </div>
                        <div class="form-group">
                            <label>Nama *</label>
                            <input type="text" name="nama_camat" id="nama" value="<?=$data['nama_camat']?>" class="form-control" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan *</label>
                            <select name="kecamatan" class="form-control" id="">
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