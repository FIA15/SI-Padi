<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."'</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="<?=base_url('uploads/img/logokrw.png')?>">
	<title>LOGIN | PADI</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/auth/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/_assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/ds.svg">
		</div>
		<div class="login-content">
			<form action="" method="post"">
				<img src="img/logokrw.png">
                <div class="title">
                    <H6>DINAS SOSIAL KAB.KARAWANG</H6>
                    Pengajuan Alat Disabilitas
                    <h2>PADI</h2>
                </div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fa fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="user" class="input"  >
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fa fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pass" class="input">
            	   </div>
            	</div>
                    <?php  
                    if(isset($_POST['login'])){
                        $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                        $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                        $sql_login = mysqli_query($con, "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ") or die (mysqli_error($con));
                        if(mysqli_num_rows($sql_login) > 0){
                            $data = mysqli_fetch_array($sql_login);  
                            $_SESSION['user'] = $user;
                            $_SESSION['user_id'] = $data['user_id'];
                            $_SESSION['id_kecamatan'] = $data['id_kecamatan'];
                            $_SESSION['id_desa'] = $data['id_desa'];
                            $_SESSION['nip'] = $data['nip'];
                            $_SESSION['level'] = $data['level'];
                            
                            echo "<script>window.location='".base_url()."'</script>";
                        } else { ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger alert-dismisable" role="alert">
                                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login Gagal</strong> Username / Password Salah
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
            	<input type="submit" class="btn" name="login" value="Masuk">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?=base_url()?>/auth/main.js"></script>
</body>
</html>
<?php
}
?>
