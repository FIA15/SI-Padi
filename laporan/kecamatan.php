<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        LAPORAN
        <small>Data Kecamatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Kecamatan / Report</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kecamatan</h3>
                <div class="pull-right">
                    <a href="<?=base_url('laporan/kecamatan.php')?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
                    <a href="<?=base_url('kecamatan')?>" class="btn btn-warning btn-flat"><i class="glyphicon glyphicon-triangle-left"></i>Back</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Kecamatan</th>
                        <th>Nama Kecamatan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_kecamatan = mysqli_query($con, "SELECT * FROM kecamatan") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_kecamatan) > 0){
                    while($data = mysqli_fetch_array($sql_kecamatan)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_kecamatan']?></td>
                            <td><?=$data['nama_kecamatan']?></td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Di Temukan</td></tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
</section>

<?php include_once('../_footer.php');?>