<?php 
include_once('../_header.php');
if($_SESSION['level'] !== 'User'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}
?>
<section class="content-header">
    <h1>
        Pengajuan
        <small>Data Menunggu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Pengajuan /Menunggu</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengajuan Menunggu</h3>
                <div class="pull-right">
                    <a href="dataterima.php" class="btn btn-success btn-flat"><i class="fa fa-check-circle"></i> Diterima</a>
                    <a href="datatolak.php" class="btn btn-danger btn-flat"><i class="fa fa-ban"></i> Ditolak</a>
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Tambah</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Pengajuan</th>
                        <th>Tanggal Pengajuan</th>
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
                            AND pengajuan.user_id = '".$id_user."'
                        ";
                $sql_pengajuan = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pengajuan) > 0){
                    while($data = mysqli_fetch_array($sql_pengajuan)){
                        $status = '';
                        if($data['approve1'] == 0){
                            $status = '<span class="label label-warning">Menunggu Persetujuan Kecamatan</span>';
                            }else if($data['approve1'] == 2){
                                $status = '<span class="label label-danger">Pengajuan Di Tolak Kecamatan</span>';
                        }else if($data['approve1'] == 1 && $data['approve2'] == 0 ){
                            $status = '<span class="label label-warning">Menunggu Persetujuan Kasie</span>';
                            }else if($data['approve2'] == 2){
                                $status = '<span class="label label-danger">Pengajuan Di Tolak Kasie</span>';
                        }else if($data['approve2'] == 1 && $data['approve3'] == 0){
                            $status = '<span class="label label-warning">Menunggu Persetujuan Kabid';
                            }else if($data['approve3'] == 2){
                                $status = '<span class="label label-danger  ">Pengajuan Di Tolak Kabid</span>';
                        }else if($data['approve1'] == 1 && $data['approve2'] == 1 && $data['approve3'] == 1){
                            $status = '<span class="label label-success">Pengajuan Telah Di Setujui</span>';
                        }
                        ?>
                        
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_pengajuan']?></td>
                            <td><?=$data['tanggal_pengajuan']?></td>
                            <td><?=$data['nama_client']?></td>
                            <td><?=$data['nik_p']?></td>
                            <td><?=$data['notelp']?></td>
                            <td><?=$status?></td>
                            <td class="text-center" width="160px">    
                                <a href="detail.php?id=<?=$data['id_pengajuan']?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="<?=base_url()?>/cetak/cetak.php?id=<?=$data['id_pengajuan']?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                                <a href="del.php?id=<?=$data['id_pengajuan']?>" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
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