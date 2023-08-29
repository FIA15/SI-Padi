<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}
?>

<section class="content-header">
    <h1>
        Approve 2
        <small>Data Pengajuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Approve 2</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengajuan</h3>
                <div class="pull-right">
                    <a href="datatolak.php" class="btn btn-danger btn-flat"><i class="fa fa-ban"></i> DITOLAK</a>
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
                $query = "SELECT * FROM pengajuan
                            INNER JOIN pegawai on pengajuan.nip = pegawai.nip
                            INNER JOIN kecamatan on pengajuan.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on pengajuan.id_desa = desa.id_desa
                            INNER JOIN client on pengajuan.nik_p = client.nik_p
                            WHERE pengajuan.approve1 = 1 AND approve2 = 0
                            
                        ";
                $sql_pengajuan = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pengajuan) > 0){
                    while($data = mysqli_fetch_array($sql_pengajuan)){
                        $status = '';
                            if($data['approve1'] == 1 && $data['approve2'] == 0 ){
                                $status = '<span class="label label-warning">Menunggu Persetujuan Anda</span>';
                            }else($data['approve2'] == 2){
                                $status = '<span class="label label-danger">Anda Menolak Pengajuan</span>'
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
                                <a href="detail.php?id=<?=$data['id_pengajuan']?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-eye"></i> Detail
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