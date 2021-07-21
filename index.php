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

$mnu="";
if(!empty($_GET["mnu"])){
$mnu=$_GET["mnu"];
}
date_default_timezone_set("Asia/Jakarta");

	$sql="select * from `$tbperiode` where `status`='Active'";
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
	<title>Mantika English Academic</title>
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

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>

	<style>
		.iconSet{
			background-size: 20px;
			vertical-align: middle;
		}
	</style>
	</head>
	<body>
		
	<!---<div class="fh5co-loader"></div>--->
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-1">
						<div id="fh5co-logo"><font color=white>ME</font><font color=orange>.</font><font color=white>ACADEMIC</font></div>
					</div>
					<div class="col-xs-11 text-right menu-1">
						<ul>
							<?php
if($_SESSION["cstatus"]=="Administrator"){	
      echo" 
	  <li  ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><img src='ypathicon/house-16.png'>&nbsp</img><span>Home</span></a></li>
      <li ";if($mnu=="admin" || $mnu=="pengajar" || $mnu=="periode" || $mnu=="program" || $mnu=="siswa" ){echo"class='has-dropdown active'";}else{echo"class='has-dropdown'";} echo"><a href='#'><img src='ypathicon/conference-call-16.png'>&nbsp</img><span>Library</span></a>
	  	<ul class=dropdown>
	  		<li ";if($mnu=="admin"){echo"class='active'";} echo"><a href='index.php?mnu=admin'><img src='ypathicon/manager-16.png'>&nbsp</img>Admin</a></li>
	  		<li ";if($mnu=="siswa"){echo"class='active'";} echo"><a href='index.php?mnu=siswa'><img src='ypathicon/student-16.png'>&nbsp</img>Student</a></li>
	  		<li ";if($mnu=="orangtua"){echo"class='active'";} echo"><a href='index.php?mnu=orangtua'><img src='ypathicon/group-16.png'>&nbsp</img>Parent</a></li>
			<li ";if($mnu=="pengajar"){echo"class='active'";} echo"><a href='index.php?mnu=pengajar'><img src='ypathicon/user-7-16.png'>&nbsp</img>Teacher</a></li>
	  		<li ";if($mnu=="program"){echo"class='active'";} echo"><a href='index.php?mnu=program'><img src='ypathicon/school-16.png'>&nbsp</img>Program</a></li>
	  		<li ";if($mnu=="ruangan"){echo"class='active'";} echo"><a href='index.php?mnu=ruangan'><img src='ypathicon/building-16.png'>&nbsp</img>Room</a></li>
	  		<li ";if($mnu=="sesi"){echo"class='active'";} echo"><a href='index.php?mnu=sesi'><img src='ypathicon/time-8-16.png'>&nbsp</img>Session</a></li>
	  		<li ";if($mnu=="periode"){echo"class='active'";} echo"><a href='index.php?mnu=periode'><img src='ypathicon/calendar-11-16.png'>&nbsp</img>Period</a></li>	
		</ul>
	  </li>
	    <li ";if($mnu=="kelas"){echo"class='active'";} echo"><a href='index.php?mnu=kelas'><img src='ypathicon/book-2-16.png'>&nbsp</img><span>Academic</span></a>
	  </li>
        <li class='btn-cta'";if($mnu=="logout"){echo"class='btn-cta'";} echo"><a href='?mnu=logout'><span><img src='ypathicon/door-9-16.png'>&nbsp</img> Logout</span></a></li>";

}
							
else if($_SESSION["cstatus"]=="Siswa"){
	echo"
	 <li  ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><img src='ypathicon/house-16.png'>&nbsp</img><span>Home</span></a></li>
	 <li ";if($mnu=="sprofil"){echo"class='active'";} echo"><a href='index.php?mnu=sprofil'><img src='ypathicon/contacts-16.png'>&nbsp</img>Profile</a></li>
	<li ";if($mnu=="skelas"){echo"class='active'";}echo"><a href='index.php?mnu=skelas'><img src='ypathicon/book-2-16.png'>&nbsp</img><span>Academic History</span></a>
	<li class='btn-cta' ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span><img src='ypathicon/door-9-16.png'>&nbsp</img> Logout</span></a></li>";
}

else if($_SESSION["cstatus"]=="Orang Tua"){
	echo"
	 <li  ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><img src='ypathicon/house-16.png'>&nbsp</img><span>Home</span></a></li>
	 <li ";if($mnu=="oprofil"){echo"class='active'";} echo"><a href='index.php?mnu=oprofil'><img src='ypathicon/contacts-16.png'>&nbsp</img>Profile</a></li>
	<li ";if($mnu=="okelas"){echo"class='active'";}echo"><a href='index.php?mnu=okelas'><img src='ypathicon/book-2-16.png'>&nbsp</img><span>Academic History</span></a>
	<li class='btn-cta' ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span><img src='ypathicon/door-9-16.png'>&nbsp</img> Logout</span></a></li>";
}

else if($_SESSION["cstatus"]=="Pengajar"){
	echo"
	 <li  ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'><img src='ypathicon/house-16.png'>&nbsp</img><span>Home</span></a></li>
	 <li ";if($mnu=="profil"){echo"class='active'";} echo"><a href='index.php?mnu=profil'><img src='ypathicon/contacts-16.png'>&nbsp</img>Profile</a></li>
	<li ";if($mnu=="pkelas"){echo"class='active'";} echo"><a href='index.php?mnu=pkelas'><img src='ypathicon/book-2-16.png'>&nbsp</img><span>Academic</span></a></li>
	<li class='btn-cta'";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'><span><img src='ypathicon/door-9-16.png'>&nbsp</img> Logout</span></a></li>";
}
							
else{
	 echo"<script>location.href='loginb.php'</script>";
	 exit;
	}
      						?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

<?php
if(empty($mnu) || $mnu=="loginb.php"){
require_once"header.php";
}
else{
require_once"header.php";
}
?>
	<div id="fh5co-counter" class="fh5co-counters">
		<div class="container">
<?php 
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="siswa"){require_once"siswa/siswa.php";}
else if($mnu=="orangtua"){require_once"ortu/ortu.php";}
else if($mnu=="pengajar"){require_once"pengajar/pengajar.php";}
else if($mnu=="program"){require_once"program/program.php";}
else if($mnu=="ruangan"){require_once"ruangan/ruangan.php";}
else if($mnu=="sesi"){require_once"sesi/sesi.php";}
else if($mnu=="periode"){require_once"periode/periode.php";}
else if($mnu=="kelas"){require_once"kelas/kelas.php";}
else if($mnu=="peserta"){require_once"peserta/peserta.php";}
else if($mnu=="mnilai"){require_once"nilai/mnilai.php";}
else if($mnu=="fnilai"){require_once"nilai/fnilai.php";}
else if($mnu=="absensi"){require_once"absensi/absensi.php";}
else if($mnu=="absensi_detail"){require_once"absensi_detail/absensi_detail.php";}

else if($mnu=="oprofil"){require_once"ortu/oprofil.php";}
else if($mnu=="oprofil2"){require_once"ortu/oprofil2.php";}

else if($mnu=="profil"){require_once"pengajar/profil.php";}
else if($mnu=="profil2"){require_once"pengajar/profil2.php";}

else if($mnu=="pkelas"){require_once"kelas/pkelas.php";}
else if($mnu=="ppeserta"){require_once"peserta/ppeserta.php";}
else if($mnu=="pabsensi"){require_once"absensi/pabsensi.php";}
else if($mnu=="minnilai"){require_once"nilai/minnilai.php";}
else if($mnu=="finnilai"){require_once"nilai/finnilai.php";}
else if($mnu=="pabsensi_detail"){require_once"absensi_detail/pabsensi_detail.php";}

else if($mnu=="sprofil"){require_once"siswa/sprofil.php";}
else if($mnu=="sprofil2"){require_once"siswa/sprofil2.php";}

else if($mnu=="skelas"){require_once"kelas/skelas.php";}
else if($mnu=="shistori"){require_once"nilai/snilai.php";}
else if($mnu=="okelas"){require_once"kelas/okelas.php";}
else if($mnu=="ohistori"){require_once"nilai/onilai.php";}

else if($mnu=="login"){require_once"loginb.php";}
else if($mnu=="logout"){require_once"logout.php";}
			
else {require_once"home.php";}
 ?>
		</div>
	</div>
	
	
	<?php
	
	require_once"footer.php";
	
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<?php if($mnu=="" || $mnu=="login"|| $mnu=="home"){?>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing --><?php }?>
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
	<!-- Main -->
	<script src="js/main.js"></script>
	</body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "January", "February", "March", "April", "May","June", "July", "August", "September","October", "November", "December");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "May","Jun", "Jul", "Aug", "Sep","Oct", "Nov", "Dec");
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
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"||$arr[1]=="Aug"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"||$arr[1]=="Oct"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"||$arr[1]=="Dec"){$bul="12";}
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
$field="nama_admin";
$sql="SELECT `$field` FROM `tb_admin` where `id_admin`='$kode'";
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

function getOrangtua($conn,$kode){
$field="nama_orangtua";
$sql="SELECT `$field` FROM `tb_orangtua` where `id_orangtua`='$kode'";
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

function getMrMs($conn,$kode){
$field="jenis_kelamin";
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

function getLevel($conn,$kode){
$field="level";
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

function getRuangan($conn,$kode){
$field="nama_ruangan";
$sql="SELECT `$field` FROM `tb_ruangan` where `id_ruangan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getSesiHari($conn,$kode){
$field="hari";
$sql="SELECT `$field` FROM `tb_sesi` where `id_sesi`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getSesiWaktu($conn,$kode){
$field="waktu";
$sql="SELECT `$field` FROM `tb_sesi` where `id_sesi`='$kode'";
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
$field="id_pengajar";
$sql="SELECT `$field` FROM `tb_kelas` where `id_kelas`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getTerm($conn,$kode){
$field="term";
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

<!--UNUSED
<li ";if($mnu=="pabsensi"){echo"class='active'";} echo"><a href='index.php?mnu=pabsensi'><img src='ypathicon/today-16.png'>&nbsp</img>Kehadiran</a></li>
-->