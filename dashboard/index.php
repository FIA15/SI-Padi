<?php include_once('../_header.php');?>
<section class="content-header">
    <h1>
        Dashboard
        <small>Dashboard</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
        <div class="box">
            <div class="box-header with-border">
                    <?php
                        $level='';
                        if($_SESSION['level'] == 'User'){
                            echo $level = "Operator Desa";
                        } else if ($_SESSION['level'] == 'Kecamatan'){
                            echo $level = "Operator Kecamatan";
                        } else if ($_SESSION['level'] == 'Kabid'){
                            echo $level = "Kepala Bidang";
                        } else {
                            echo $level = "Kasie";
                        }
                    ?>
                <h3 class="box-title">DASHBOARD</h3>
                <br><br>
                <center><h1>SELAMAT DATANG <strong><?=$data_pegawai['nama']?></strong></h1></center>
                <center><h4>Anda Login Sebagai <strong><?=$level?></strong></h4></center>
                <table>
                     <tr>
                        <td>Nama</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_pegawai['nama']?> </td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$_SESSION['nip']?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_kecamatan['nama_kecamatan']?> </td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$data_desa['nama_desa']?> </td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>&emsp;:</td>
                        <td>&emsp;<?=$level?></td>
                    </tr>
                </table>
                
            </div>
        </div>
</section>   

<?php include_once('../_footer.php');?>