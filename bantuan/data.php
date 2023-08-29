<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Bantuan
        <small>Data Bantuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Bantuan</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Bantuan</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                    <!-- <a href="<?=base_url('cetak/bantuan.php')?>" class="btn btn-success btn-flat"><i class="fa fa-book"></i> Report</a> -->
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Bantuan</th>
                        <th>Nama Bantuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_bantuan = mysqli_query($con, "SELECT * FROM bantuan") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_bantuan) > 0){
                    while($data = mysqli_fetch_array($sql_bantuan)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_bantuan']?></td>
                            <td><?=$data['nama_bantuan']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['id_bantuan']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update  
                                </a>
                                <a href="del.php?id=<?=$data['id_bantuan']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
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