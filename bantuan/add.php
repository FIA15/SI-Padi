<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bantuan
        <small>Tambah Bantuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Bantuan / Tambah Bantuan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Bantuan</h3>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i> Kembali</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="proses.php" method="POST">
                        <div class="form-group">
                            <label>ID Bantuan *</label>
                            <?php
                                $query = mysqli_query($con, "SELECT max(id_bantuan) as kodeTerbesar FROM bantuan") or die (mysqli_error($con));
                                $data = mysqli_fetch_array($query);
                                $kodeBantuan = $data['kodeTerbesar'];
                                $urutan = (int) substr($kodeBantuan, 5, 3);
                                $urutan++;
                                $huruf = "BNT";
                                // $kodeBarang = $huruf . sprintf("%03s", $urutan);
                                $kodeBantuan = $huruf.'-'.sprintf("%03s", $urutan);
                            ?>
                            <input type="text" name="id_bantuan" value="<?=$kodeBantuan?>" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Nama Bantuan *</label>
                            <input type="text" name="nama_bantuan" value="" class="form-control" onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success"><i class="fa fa-paper-plane "></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>