<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Pengajuan
        <small>Data Pengajuan Tunggu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Pengajuan / Tunggu</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengajuan Tunggu</h3>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-triangle-left"></i> Kembali</a>
                    <a href="<?=base_url('cetak/tunggu.php')?>" class="btn btn-warning btn-flat"><i class="fa fa-book"></i> Report</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Pengajuan</th>
                        <th>Pegawai</th>
                        <th>Kecamatan</th>
                        <th>Desa / Kelurahan</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No Telpon</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $id_user = $_SESSION['user_id'];
                $query = "SELECT * FROM pengajuan
                            INNER JOIN pegawai on pengajuan.nip = pegawai.nip
                            INNER JOIN kecamatan on pengajuan.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on pengajuan.id_desa = desa.id_desa
                            INNER JOIN client on pengajuan.nik_p = client.nik_p
                            WHERE pengajuan.approve1 = 0 
                            OR pengajuan.approve1 = 1 AND pengajuan.approve2 = 0 
                            OR pengajuan.approve1 = 1 AND pengajuan.approve2 = 1 AND pengajuan.approve3 = 0 
                            
                        ";
                $sql_pengajuan = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pengajuan) > 0){
                    while($data = mysqli_fetch_array($sql_pengajuan)){
                        $status = '';
                        if($data['approve1'] == 1 && $data['approve2'] == 1 && $data['approve3'] == 1){
                            $status = '<span class="label label-success">Pengajuan Telah Di Setujui</span>';
                        }
                        ?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_pengajuan']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['nama_kecamatan']?></td>
                            <td><?=$data['nama_desa']?></td>
                            <td><?=$data['nama_client']?></td>
                            <td><?=$data['nik_p']?></td>
                            <td><?=$data['notelp']?></td>   
                            <td><?=$status?></td>
                            <td class="text-center" width="160px">    
                                <a href="detailterima.php?id=<?=$data['id_pengajuan']?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="<?=base_url()?>/cetak/cetak.php?id=<?=$data['id_pengajuan']?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    echo "<tr><td colspan=\"100%\" align=\"center\">Data Tidak Di Temukan</td></tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
</section>

<?php include_once('../_footer.php');?>