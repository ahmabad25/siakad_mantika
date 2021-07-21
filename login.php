<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");


	$sql="select * from `$tbperiode` where `status`='Aktif'";
	$d=getField($conn,$sql);
				$gid_periode=$d["id_periode"];
				$gnama_periode=$d["nama_periode"];
				$gdeskripsi=$d["deskripsi"];
				
				
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi SIAKAD MANTIKA </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Aplikasi SIAKAD MANTIKA" />
	<meta name="keywords" content="Aplikasi SIAKAD MANTIKA" />
	<meta name="author" content="Aplikasi SIAKAD MANTIKA" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

		<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="num">Call: +62 21 78889003</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-1">
						<div id="fh5co-logo"><a href="index.php">ME<font color=orange>.</font>ACADEMIC</a></div>
					</div>
					<div class="col-xs-11 text-right menu-1">
						<ul>
							<?php
if($_SESSION["cstatus"]=="Administrator"){	
      echo"
	  <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
      <li class=has-dropdown><a href='#'>Library</a>
	  	<ul class=dropdown>
	  		<li ";if($mnu=="admin"){echo"class='active'";} echo"><a href='index.php?mnu=admin'>Admin</a></li>
			<li ";if($mnu=="pengajar"){echo"class='active'";} echo"><a href='index.php?mnu=pengajar'>Pengajar</a></li>
			
	  		<li ";if($mnu=="periode"){echo"class='active'";} echo"><a href='index.php?mnu=periode'>Periode</a></li>
			
	  		<li ";if($mnu=="program"){echo"class='active'";} echo"><a href='index.php?mnu=program'>Program</a></li>
	  		<li ";if($mnu=="siswa"){echo"class='active'";} echo"><a href='index.php?mnu=siswa'>Siswa</a></li>
			
	  		
		</ul>
	  </li>
	  <li class=has-dropdown ";if($mnu=="kelas"){echo"class='active'";} echo"><a href='#'>Akademik</a>
	  	<ul class=dropdown>
	  		
			<li ";if($mnu=="kelas"){echo"class='active'";} echo"><a href='index.php?mnu=kelas'>Kelas</a></li>
			<li ";if($mnu=="peserta"){echo"class='active'";} echo"><a href='index.php?mnu=peserta'>Peserta</a></li>
	  		<li ";if($mnu=="nilai"){echo"class='active'";} echo"><a href='index.php?mnu=nilai'>Nilai</a></li>
	  		<li ";if($mnu=="absensi"){echo"class='active'";} echo"><a href='index.php?mnu=absensi'>Absensi</a></li>
		</ul>
	  </li>
      <li class='btn-cta' ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span>Logout</span></a></li>";
}
							
else if($_SESSION["cstatus"]=="Siswa"){
	echo"
	<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
	<li ";if($mnu=="sprofil"){echo"class='active'";} echo"><a href='index.php?mnu=sprofil'>Profil</a></li>
    <li ";if($mnu=="speserta"){echo"class='active'";} echo"><a href='index.php?mnu=speserta'>Peserta</a></li>
	<li ";if($mnu=="snilai"){echo"class='active'";} echo"><a href='index.php?mnu=snilai'>Nilai</a></li>
	<li ";if($mnu=="sabsensi"){echo"class='active'";} echo"><a href='index.php?mnu=sabsensi'>Absensi</a></li>
	<li class='btn-cta' ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span>Logout</span></a></li>";
}

else if($_SESSION["cstatus"]=="Pengajar"){
	echo"
	<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
	<li ";if($mnu=="profil"){echo"class='active'";} echo"><a href='index.php?mnu=profil'>Profil</a></li>
    <li ";if($mnu=="pkelas"){echo"class='active'";} echo"><a href='index.php?mnu=pkelas'>Kelas</a></li>
  	<li ";if($mnu=="ppeserta"){echo"class='active'";} echo"><a href='index.php?mnu=ppeserta'>Peserta</a></li>
  	<li ";if($mnu=="pnilai"){echo"class='active'";} echo"><a href='index.php?mnu=pnilai'>Nilai</a></li>
	<li ";if($mnu=="pabsensi"){echo"class='active'";} echo"><a href='index.php?mnu=pabsensi'>Absensi</a></li>
	<li class='btn-cta' ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span>Logout</span></a></li>";
}
							
else{
	 echo"";
	}
      						?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Loging In</h1>
							<h2>Please type your username and password in the respective boxes below to access your account!<br>Don't have one? You can click 'Sign Up' above. Thank you!</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Jakarta Selatan</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@siakad.com</a></li>
							<li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6">
					<h3>Verifikasi Login</h3>
					<form name="formLogin" method="post" action="login.php">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" class="form-control" name="username"  placeholder="Username">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="subject" class="form-control" name="password"   placeholder="Password">
							</div>
						</div>



						<div class="form-group">
							<input type="submit" name="Login" value="Login" class="btn btn-primary">
							<input type="reset" name="reset" value="Reset" class="btn btn-primary">
						</div>
					</form>		
				</div>
			</div>
			
		</div>
	</div>
	
	
	
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.603520147656!2d106.79238741419917!3d-6.315698795429247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee3e065d4f6b%3A0xe176f81a31564166!2sUniversitas+Pembangunan+Nasional+%22Veteran%22+Jakarta!5e0!3m2!1sen!2sid!4v1554772058916!5m2!1sen!2sid" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>



	<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Lets Get Started</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p><a href="#" class="btn btn-default btn-lg">Create A Free Course</a></p>
				</div>
			</div>
		</div>
	</div>
	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h4>About Learning</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Learning</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Course</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Learn &amp; Grow</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Blog</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Engage us</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Marketing</a></li>
						<li><a href="#">Visual Assistant</a></li>
						<li><a href="#">System Analysis</a></li>
						<li><a href="#">Advertise</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<h4>Legal</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>



<?php
if(isset($_POST["Login"])){
	$usr=$_POST["username"];
	$pas=$_POST["password"];
	
		$sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql2="select * from `$tbsiswa` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql3="select * from `$tbpengajar` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["kode_admin"];
				$nama=$d["username"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$usr;
				   $_SESSION["cstatus"]="Administrator";
		echo "<script>alert('Autentikasi Administrator berhasil. Selamat Datang, ".$_SESSION["cnama"]."!');
		document.location.href='index.php?mnu=home';</script>";
		}
		elseif(getJum($conn,$sql2)>0){
			$d=getField($conn,$sql2);
				$kode=$d["id_siswa"];
				$namasiswa=$d["nama_siswa"];
					$_SESSION["cid"]=$kode;
					$_SESSION["cnama"]=$namasiswa;
					$_SESSION["cstatus"]="Siswa";
		echo "<script>alert('Selamat Datang Siswa, ".$_SESSION["cnama"]."!');
		document.location.href='index.php?mnu=home';</script>";
		}
		elseif(getJum($conn,$sql3)>0){
			$d=getField($conn,$sql3);
				$kode=$d["id_pengajar"];
				$namasiswa=$d["nama_pengajar"];
					$_SESSION["cid"]=$kode;
					$_SESSION["cnama"]=$namasiswa;
					$_SESSION["cstatus"]="Pengajar";
		echo "<script>alert('Selamat Datang Pengajar, ".$_SESSION["cnama"]."!');
		document.location.href='index.php?mnu=home';</script>";
		}
		else{
			session_destroy();
			echo "<script>alert('Login gagal. Silahkan periksa kembali username dan password yang anda masukkan!');
			document.location.href='login.php';</script>";
		}
}


?>



<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getSiswa($conn,$kode){
$field="nama_siswa";
$sql="SELECT `$field` FROM `tb_siswa` where `id_siswa`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getPengajar($conn,$kode){
$field="nama_pengajar";
$sql="SELECT `$field` FROM `tb_pengajar` where `id_pengajar`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getProgram($conn,$kode){
$field="nama_program";
$sql="SELECT `$field` FROM `tb_program` where `id_program`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getPeriode($conn,$kode){
$field="nama_periode";
$sql="SELECT `$field` FROM `tb_periode` where `id_periode`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getPeserta($conn,$kode){
$field="catatan";
$sql="SELECT `$field` FROM `tb_peserta` where `id_peserta`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getKelas($conn,$kode){
$field="nama_kelas";
$sql="SELECT `$field` FROM `tb_kelas` where `id_kelas`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getAbsensi($conn,$kode){
$field="id_absensi";
$sql="SELECT `$field` FROM `tb_absensi` where `id_absensi`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>