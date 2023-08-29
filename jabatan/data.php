<?php include_once('../_header.php');
if($_SESSION['level'] !== 'Admin'){
    echo "<script>window.location='".base_url('dashboard')."'</script>";
}?>

<section class="content-header">
    <h1>
        Jabatan
        <small>Data Jabatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Master / Jabatan</li>
    </ol>
</section>

<section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Jabatan</h3>
                <div class="pull-right">
                    <a href="add.php" class="btn btn-primary btn-flat"><i class="fa fa-plus-square"></i> Create</a>
                </div>
            </div>   
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped nowrap" id="table1">
                <thead >
                    <tr>
                    <th>#</th>
                        <th>ID Jabatan</th>
                        <th>Nama Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_jabatan = mysqli_query($con, "SELECT * FROM jabatan") or die (mysqli_error($con));
                if(mysqli_num_rows($sql_jabatan) > 0){
                    while($data = mysqli_fetch_array($sql_jabatan)){?>
                        <tr>
                            <td style="width: 5%;"><?=$no++?></td>
                            <td><?=$data['id_jabatan']?></td>
                            <td><?=$data['nama_jabatan']?></td>
                            <td class="text-center" width="160px">    
                                <a href="edit.php?id=<?=$data['id_jabatan']?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Update  
                                </a>
                                <a href="del.php?id=<?=$data['id_jabatan']?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-xs">
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