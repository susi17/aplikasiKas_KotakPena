<?php
include "library/koneksi.php";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" style="background-color: #133337"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Kas Kotak Pena</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="css/bootstrap.css" />
	 <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
	 <link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body style="padding-top: 0px; padding-bottom: 0px">
<?php
error_reporting();
session_start();
//include_once("library/koneksi.php");

if(@$_POST["login"]){ //jika tombol Login diklik
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	$level=$_POST["level"];
	
	if($user!="" && $pass!=""){
		//include_once("library/koneksi.php");
		$em = mysqli_query($koneksi, "SELECT * from login where password = '$pass' AND username = '$user'");
		$data = mysqli_fetch_assoc($em);
		
		if( $level=='members' && $data["username"] == $user && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
			$_SESSION["user"]=$data["username"];
			$_SESSION["pass"]=$data["password"];
			
			$_SESSION["namalengkap"]=$data["nama"];
			$_SESSION["leveluser"]   = $data["level"];
			header("Location:admin/index.php");
      
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	}

}
?>
   <!-- PAGE CONTENT --> 

   <div class="col-md-4 col-md-offset-4 form-login">
   
              <h1 style="text-align: center"><span style="color: red">Aplikasi Kas</span> <span style="color: white">Kotak Pena</span> </h1>
              <h4 style="text-align: center; color: #4eb3f0" >&copy; Kotak Pena</h4>
          
   <div class="outter-form-login" >

        
            <form action="" class="inner-login" method="post" >
            <h3 class="text-center title-login">Login User</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Username" required >
                </div>
<input type="hidden" name="level" value="members">
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                
                <input type="submit" class="btn btn-block btn-warning" value="LOGIN" name="login" style="background-color: #133337"  />
                
                <br>
            </form>
        </div>
    </div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="js/jquery-2.0.3.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
