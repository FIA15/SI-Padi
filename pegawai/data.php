<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Pegawai
        <small>Data Pegawai</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Pegawai</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data pegawai</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                    <!-- <a href="<?=base_url('cetak/pegawai.php')?>" class="btn btn-success btn-flat"><i class="fa fa-book"></i> Report</a> -->
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead  >
                    <tr>
                        <th>#</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM pegawai 
                            INNER JOIN jabatan on pegawai.id_jabatan = jabatan.id_jabatan
                            INNER JOIN kecamatan on pegawai.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on pegawai.id_desa = desa.id_desa
                         ";
                $sql_pegawai = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_pegawai) > 0){
                    while($data = mysqli_fetch_array($sql_pegawai)){?>
                        <tr>
                        <td style="width: 5%;"><?=$no++?></td>
                        <td><?=$data['nip']?></td>
                        <td><?=$data['nama']?></td>
                        <td><?=$data['email']?></td>
                        <td><?=$data['nama_jabatan']?></td>
                        <td class="text-center" width="160px">    
                            <a href="detail.php?id=<?=$data['nip']?>"  class="btn btn-warning btn-xs">
                                <i class="fa fa-eye"></i> Detail  
                            </a>
                            <a href="edit.php?id=<?=$data['nip']?>"  class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Update  
                            </a>
                            <a href="del.php?id=<?=$data['nip']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete  
                            </a>
                        </td>
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