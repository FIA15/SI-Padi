<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Kecamatan'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Approve 1
        <small>Data Pengajuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Approve 1</li>
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
                $id_kecamatan = $_SESSION["id_kecamatan"];
                $no = 1;
                $query = "SELECT * FROM pengajuan
                            INNER JOIN pegawai on pengajuan.nip = pegawai.nip
                            INNER JOIN kecamatan on pengajuan.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on pengajuan.id_desa = desa.id_desa
                            INNER JOIN client on pengajuan.nik_p = client.nik_p
                            WHERE approve1 = 0 AND pengajuan.id_kecamatan = '".$id_kecamatan."'
                            
                        ";
                $sql_pengajuan = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pengajuan) > 0){
                    while($data = mysqli_fetch_array($sql_pengajuan)){
                        $status = '';
                        if($data['approve1'] == 0){
                            $status = '<span class="label label-warning">Menunggu Persetujuan Anda</span>';
                            }else if($data['approve1'] == 2){
                                $status = '<span class="label label-danger"Anda Menolak Pengajuan</span>';
                        }else if($data['approve1'] == 1 && $data['approve2'] == 0 ){
                            $status = 'Menunggu Persetujuan Kasie';
                            }else if($data['approve2'] == 2){
                                $status = 'Pengajuan Di Tolak Kasie';
                        }else if($data['approve2'] == 1 && $data['approve3'] == 0){
                            $status = 'Menunggu Persetujuan Kabid';
                            }else if($data['approve3'] == 2){
                                $status = 'Pengajuan Di Tolak Kabid';
                        }else if($data['approve1'] == 1 && $data['approve2'] == 1 && $data['approve3'] == 1){
                            $status = 'Pengajuan Telah Di Setujui';
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