<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Kabid'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Approve 3
        <small>Detail Data Pengajuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active ">Transaksi / Approve 3 / Detail Pengajuan  <li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Pengajuan</h3>
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
                    $sql_pengajuan = mysqli_query($con,"SELECT * FROM pengajuan 
                            INNER JOIN pegawai on pengajuan.nip = pegawai.nip
                            INNER JOIN kecamatan on pengajuan.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on pengajuan.id_desa = desa.id_desa
                            INNER JOIN bantuan on pengajuan.id_bantuan = bantuan.id_bantuan
                            INNER JOIN client on pengajuan.nik_p = client.nik_p 
                            INNER JOIN nmcamat on pengajuan.nip_c = nmcamat.nip_c 
                            WHERE id_pengajuan = '$id' ") or die(mysqli_error($con));
                    $data = mysqli_fetch_array($sql_pengajuan);
                    $status = '';
                        if($data['approve3'] == 0){
                            $status = '<span class="label label-warning">Menunggu Persetujuan Anda</span>';
                        }else ($data['approve3'] == 2){
                            $status = '<span class="label label-danger">Anda Menolak Pengajuan</span>'
                        }
                ?>
                    <form action="proses.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>ID Pengajuan</label>
                            <label> : </label>
                            <input type="hidden" name="id" class="form-control"  value="<?=$data['id_pengajuan']?>">
                            <div>
                                <?=$data['id_pengajuan']?>
                            </div>
                            <label>Nama Pegawai</label>
                            <label> : </label>
                            <input type="hidden" name="nip" class="form-control"  value="<?=$data['nip']?>">
                            <div>
                                <?=$data['nip']?> - <?=$data['nama']?>
                            </div>
                            <label>Kecamatan</label>
                            <label> : </label>
                            <input type="hidden" name="kecamatan" class="form-control"  value="<?=$data['id_kecamatan']?>">
                            <div>
                                <?=$data['nama_kecamatan']?>
                            </div>
                            <label>Desa / Kelurahan</label>
                            <label> : </label>
                            <input type="hidden" name="user_id" class="form-control"  value="<?=$data['id_desa']?>">
                            <div>
                                <?=$data['nama_desa']?>
                            </div>
                            <label>Nama</label>
                            <label> : </label>
                            <input type="hidden" name="nik_p" class="form-control"  value="<?=$data['nik_p']?>">
                            <div>
                                <?=$data['nama_client']?>
                            </div>
                            <label>Tanggal Pengajuan</label>
                            <label> : </label>
                            <input type="hidden" name="tanggal_pengajuan"  value="<?=$data['tanggal_pengajuan']?>" class=" form-control">
                            <div>
                                <?=$data['tanggal_pengajuan']?>
                            </div>
                            <label>Kategori Bantuan </label>
                            <label> : </label>
                            <input type="hidden" name="id_bantuan" class="form-control"  value="<?=$data['id_bantuan']?>">
                            <div>
                                <?=$data['nama_bantuan']?>
                            </div>
                            <label>Nama Camat </label>
                            <label> : </label>
                            <input type="hidden" name="nip_c" class="form-control"  value="<?=$data['nip_c']?>">
                            <div>
                                <?=$data['nama_camat']?>
                            </div>
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group">
                            <label>KTP *</label>
                            <div>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['ktp'])?>" style="width:100% ">
                            </div>
                            <input type="hidden" name="ktp" class="form-control"  value="<?=$data['ktp']?>">
                        </div>
                        <div class="form-group">
                            <label>KK *</label>
                            <div>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['kk'])?>" style="width:100% ">
                            </div>
                            <input type="hidden" name="kk" class="form-control"  value="<?=$data['kk']?>">
                        </div>
                        <div class="form-group">
                            <label>SKTM *</label>
                            <div>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['sktm'])?>" style="width:100% ">
                            </div>
                            <input type="hidden" name="sktm" class="form-control"  value="<?=$data['sktm']?>">
                        </div>
                        <div class="form-group">
                            <label>Foto Pengaju *</label>
                            <div>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['fpeng'])?>" style="width:100% ">
                            </div>
                            <input type="hidden" name="fpeng" class="form-control"  value="<?=$data['fpeng']?>">
                        </div>
                        <div class="form-group">
                            <label>Foto Rumah Pengaju *</label>
                            <div>
                                <img src="<?=base_url('uploads/pengajuan/'.$data['rpeng'])?>" style="width:100% ">
                            </div>
                            <input type="hidden" name="rpeng" class="form-control"  value="<?=$data['rpeng']?>">
                        </div>
                        <div class="form-group">
                            <label> Status</label>
                            <label> : </label>
                            <label> <?=$status?></label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="approve3" value="1" class="form-control flat-red" checked> Terima &emsp;
                            <input type="radio" name="approve3" value="2" class="form-control flat-red" > Tolak
                        </div>
                        <div class="form-group">
                            <label>Keterangan *</label>
                            <textarea name="ket3" id="" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="edit" class="btn btn-success"  onclick="return confirm('Apakah Anda Yakin ?')"><i class="fa fa-paper-plane "></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</section>

<?php include_once('../_footer.php');?>