<?php

$tanggal_lahir=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Active";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('siswa/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, alamat=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 0px;
  padding: 4px;
}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
}

#myhr {
	border: 1px solid black;
	border-radius: 5px;
}
</style>

<!-- Disini -->
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<!-- Disini -->

<?php

	$id_siswa=$_SESSION["cid"];
	$sql="select * from `$tbsiswa` where `id_siswa`='$id_siswa'";
	$d=getField($conn,$sql);
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$alamat=$d["alamat"];
				$agama=$d["agama"];
				$username=$d["username"];
				$password=$d["password"];
				$email=$d["email"];
				$no_telepon=$d["no_telepon"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];

?>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Update Student's Profile</h4></i></b>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="61%" id="mytable">
<tr>
<th valign="top" width="212"><label for="id_siswa">&emsp;Student's ID</label></th>
<th width="20" valign="top">:</th>
<th valign="top"><b><?php echo $id_siswa;?></b></th>
</tr>

<tr>
<td valign="top"><label for="nama_pengajar">&emsp;Name</label></td>
<td valign="top">:</td>
<td valign="top" width="300"><?php echo $nama_siswa;?>
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="jenis_kelamin">&emsp;Gender</label></td>
<td valign="top">:</td>
<td valign="top" colspan="1"><?php echo $jenis_kelamin;?>
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="tempat_lahir">&emsp;Birthplace</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $tempat_lahir;?>
</td>
</tr>

<tr>
<td valign="top" height="38"><label for="tanggal_lahir">&emsp;Birthday</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $tanggal_lahir;?>
</td>
</tr>

<tr>
<td valign="top"><label for="alamat">&emsp;Address</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $alamat;?>
</td>
</tr>

<tr>
<td valign="top" height="33"><label for="agama">&emsp;Religion</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $agama;?>
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="username">&emsp;Username</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $username;?>
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="password">&emsp;Password</label></td>
<td valign="top">:</td>
<td valign="top"><input name="password" type="text" id="password" value="<?php echo $password;?>" size="30" />
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="email">&emsp;E-Mail</label></td>
<td valign="top">:</td>
<td valign="top"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>

<tr>
<td valign="top" height="32"><label for="no_telepon">&emsp;Phone</label></td>
<td valign="top">:</td>
<td valign="top"><input name="no_telepon" type="text" id="no_telepon" value="<?php echo $no_telepon;?>" size="15" />
</td>
</tr>

<tr>
<td valign="top" height="33"><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $status;?></td>
</tr>

<tr>
<td valign="top" height="50"><label for="keterangan">&emsp;Note</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $keterangan;?>
</td>
<td width="199" rowspan="2">
<center>
<?php 
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
  <td><b>&emsp;Picture</b></td>
    <td>:</td>
    <td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("siswa/zoom.php?id=<?php echo $id_siswa;?>")'><?php echo $gambar0;?></a></td><td width="213"><td width="121">
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2"><input name="Simpan" type="Submit" id="Simpan" value="Save" />
         <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <a href="?mnu=sprofil"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->

<!-- Disini -->
<?php
if(isset($_POST["Simpan"])){
	$id_siswa0=strip_tags($_SESSION["cid"]);
	$nama_siswa=strip_tags($_POST["nama_siswa"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$tempat_lahir=strip_tags($_POST["tempat_lahir"]);
	$tanggal_lahir=BAL(strip_tags($_POST["tanggal_lahir"]));
	$alamat=strip_tags($_POST["alamat"]);
	$agama=strip_tags($_POST["agama"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$email=strip_tags($_POST["email"]);
	$no_telepon=strip_tags($_POST["no_telepon"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	$sql="update `$tbsiswa` set 
	`nama_siswa`='$nama_siswa',
	`jenis_kelamin`='$jenis_kelamin',
	`tempat_lahir`='$tempat_lahir',
	`tanggal_lahir`='$tanggal_lahir',
	`alamat`='$alamat',
	`agama`='$agama',
	`username`='$username',
	`password`='$password',
	`email`='$email',
	`no_telepon`='$no_telepon',
	`keterangan`='$keterangan',
	`gambar`='$gambar'
	  where `id_siswa`='$id_siswa0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Student data update successful!');document.location.href='?mnu=sprofil';</script>";}
		else{echo"<script>alert('Teacher data failed to update!');document.location.href='?mnu=sprofil';</script>";}
}
?>