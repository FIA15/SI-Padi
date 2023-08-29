<?php include_once('../_header.php');
if($_SESSION['level'] !== 'User'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Detail Pengajuan
        <small>Lihat Detail Pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Pengajuan / Detail Pengajuan  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Lihat Detail Pengajuan</h3>
            <div class="pull-right">
                <a href="datatolak.php" class="btn btn-warning btn-flat">
                <i class="glyphicon glyphicon-triangle-left"></i>Back</a>
            </div>
        </div>    
        <div class="box-body">
            <div class="row">
                <div class="col-l-4 col-md-offset-4">
                <?php
                    $id = @$_GET['id'];
                    $sql_pengajuan = mysqli_query($con,"SELECT * FROM pengajuan WHERE id_pengajuan = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_pengajuan);
                ?>
                <table>
                    <tr>
                        <td>No Pengajuan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data['id_pengajuan']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_pegawai = mysqli_query($con,"SELECT * FROM pegawai") or die(mysqli_error($con));
                            $data_pegawai = mysqli_fetch_array($sql_pegawai);
                        ?>
                        <td>Pegawai</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_pegawai['nama']?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>&emsp;<?=$data['nip']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_kecamatan = mysqli_query($con,"SELECT * FROM kecamatan") or die(mysqli_error($con));
                            $data_kecamatan = mysqli_fetch_array($sql_kecamatan);
                        ?>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_kecamatan['nama_kecamatan']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_camat = mysqli_query($con,"SELECT * FROM nmcamat") or die(mysqli_error($con));
                            $data_camat = mysqli_fetch_array($sql_camat);
                        ?>
                        <td>Nama Camat</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_camat['nama_camat']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_desa = mysqli_query($con,"SELECT * FROM desa") or die(mysqli_error($con));
                            $data_desa = mysqli_fetch_array($sql_desa);
                        ?>
                        <td>Desa / Kelurahan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_desa['nama_desa']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_client = mysqli_query($con,"SELECT * FROM client") or die(mysqli_error($con));
                            $data_client = mysqli_fetch_array($sql_client);
                        ?>
                        <td>Nama Pengaju</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_client['nama_client']?></td>
                    </tr>
                    <tr>
                        <td>NIK Pengaju</td>
                        <td>:</td>
                        <td>&emsp;<?=$data['nik_p']?></td>
                    </tr>
                    <tr>
                        <?php
                            $sql_bantuan = mysqli_query($con,"SELECT * FROM bantuan") or die(mysqli_error($con));
                            $data_bantuan = mysqli_fetch_array($sql_bantuan);
                        ?>
                        <td>Jenis Bantuan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data_bantuan['nama_bantuan']?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data['tanggal_pengajuan']?></td>
                    </tr>
                    <tr>
                        <td>Foto KTP</td>
                        <td>:</td>
                        <td>&emsp;
                            <?php if($data['ktp'] != null) { ?>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['ktp'])?>" width="200px" >
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto KK</td>
                        <td>:</td>
                        <td>&emsp;
                            <?php if($data['kk'] != null) { ?>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['kk'])?>" style="width:200px">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto SKTM</td>
                        <td>:</td>
                        <td>&emsp;
                            <?php if($data['sktm'] != null) { ?>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['sktm'])?>" style="width:200px">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto Pengaju</td>
                        <td>:</td>
                        <td>&emsp;
                            <?php if($data['fpeng'] != null) { ?>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['fpeng'])?>" style="width:200px">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto Rumah Pengaju</td>
                        <td>:</td>
                        <td>&emsp;
                            <?php if($data['rpeng'] != null) { ?>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['rpeng'])?>" style="width:200px">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <?php 
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
                        <td>Status Pengajuan</td>
                        <td>:</td>
                        <td>&emsp;
                            <strong><?=$status?></strong> 
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>&emsp;<?=$data['ket1']?></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>