<?php include_once('../_header.php');
if($_SESSION['level'] !== 'User'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Client
        <small>Data Client</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Transaksi / Client</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Client</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Desa / Kelurahan</th>
                        <th>No.Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id_desa = $_SESSION['id_desa'];
                $no = 1;
                $query = "SELECT * FROM client 
                            INNER JOIN kecamatan on client.id_kecamatan = kecamatan.id_kecamatan
                            INNER JOIN desa on client.id_desa = desa.id_desa
                            WHERE client.id_desa = '".$id_desa."'
                        ";
                $sql_client = mysqli_query($con, $query) or die (mysqli_error($con));
                if(mysqli_num_rows($sql_client) > 0){
                    while($data = mysqli_fetch_array($sql_client)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['nik_p']?></td>
                            <td><?=$data['nama_client']?></td>
                            <td><?=$data['tempatlahir']?>, <?=$data['tgllahir'] ?></td>
                            <td><?=$data['alamat']?></td>
                            <td><?=$data['nama_kecamatan']?></td>
                            <td><?=$data['nama_desa']?></td>
                            <td><?=$data['notelp']?></td>
                            <td class="text-center" width="160px">
                                <a href="edit.php?id=<?=$data['nik_p']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update  
                                </a>
                                <a href="del.php?id=<?=$data['nik_p']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete  
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